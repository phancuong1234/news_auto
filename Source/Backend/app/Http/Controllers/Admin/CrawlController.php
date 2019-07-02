<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Models\News;
use Goutte\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CrawlController extends Controller
{
    public function index()
    {
        return view('admin_page.crawl.index');
    }

    public function crawl(){
        ini_set('max_execution_time', config('setting.max_time_request'));
        $data = array();
        $client = new Client();
        $crawler = $client->request('GET', config('setting.url_crawl.dan_tri_page')); #rq to url
        $crawler->filter('.nav > li > a')->each(function ($node) { # find class of element to get data
            $data['name_category'] = $node->text();
            $data['url_cate'] = $node->attr('href');
            if(isset($data['name_category']) && trim($data['name_category']) != ''){
                $getDataCategoryFromDatabase = Category::where('name_category',$data['name_category'])->count(); #find cate exists in DB
                if($getDataCategoryFromDatabase < 1){
                    Category::create($data); # save data
                }
            }
        });
//        # crawl title and short description ,...
        $list_category = Category::all();
        if($list_category->count() > 0){
            foreach ($list_category as $list_category => $value){
                if(trim($value->name_category) != config('setting.detect_name_crawl.name_1') && trim($value->name_category) != config('setting.detect_name_crawl.name_2') && trim($value->name_category) != ''){
                    $this->crawlPost($value->url_cate); # crawl post
                }
            }
        }
        # craw detail
        $count = $this->crawlDetailPost();

        return view('ajax.admin.crawl.index', compact('count'));
    }
    public function crawlPost($url){
        $client = new Client();
        $data = array();
        $crawler = $client->request('GET', config('setting.url_crawl.dan_tri_page').$url); # rq by url
        $newUrl = explode("/", $url); # tách chuỗi để lấy url chính
        $urlFormat = '/'.$newUrl[1];
        if( $newUrl[1] == str_replace(".htm","",$newUrl[1])){ #xử lí để lấy lại url của danh mục
            $urlFormat = $urlFormat.'.htm';
        }
        $list_id_category = Category::where('url_cate', $urlFormat)->first()->id; # lấy id danh mục
        $crawler->filter('.mt3')->each(function ($node) use ($list_id_category){
            $data['title'] = $node->filter('.mr1 > h2 > a')->eq(0)->text(); # lấy được title
            $data['url_news'] = $node->filter('.mr1 > h2 > a')->eq(0)->attr('href');
            $data['id_user'] = 1;
            $temp = trim($node->filter('.fon5')->eq(0)->text()); # lấy ra description
            $posWantDel = strpos($temp, '>>'); # bắt đầu lọc description
            if($posWantDel === false){
                $data['short_description'] = $temp;
            }
            else {
                $subtemp = substr($temp, $posWantDel);
                $data['short_description'] = str_replace($subtemp, '', $temp);
            }
            $data['image'] = $node->filter('a > img')->eq(0)->attr('src'); # lấy được link ảnh
            $countPostDuplicate = News::where(['title' => $data['title']])->get(); # tìm tin tức trùng
            if ($countPostDuplicate->count() > 0){ # nếu trùng tin tức thì thực hiện
                $getPost = News::where('title', $data['title'])->first();
                $arr = json_decode($getPost->list_id_category);
                if(!in_array($list_id_category,$arr)){
                    array_push($arr,$list_id_category);
                    $data['list_id_category'] = json_encode($arr);
                    News::find($getPost->id)->update($data);
                }
            }
            else {
                $arrIdCategory = array();
                array_push($arrIdCategory,$list_id_category);
                $data['list_id_category'] = json_encode($arrIdCategory);
                News::create($data);
            }
        });
        $href = $crawler->filter('.fr > a')->eq(0)->attr('href');
        if($href != $url){ # kiem tra neu url tìm lần tiếp theo giống lần trk thì có nghĩa là danh mục này đã cào hết tin
            $this->crawlPost($href);
        }
    }

    public function crawlDetailPost(){
        ini_set('max_execution_time', config('setting.max_time_request'));
        $count = 0;
        $urlOfPost = News::all();
        $client = new Client();
        foreach($urlOfPost as $value){
            $crawler = $client->request('GET', config('setting.url_crawl.dan_tri_page').$value->url_news);
            $html = $crawler->filter('#divNewsContent')->count();
            if($html>0){
                $html = $crawler->filter('#divNewsContent')->html();
                $cutTag = $crawler->filter('.news-tag')->html();
                $data['content'] = str_replace($cutTag,'',$html);
                $status = News::find($value->id)->update(['content' => $data['content']]);
                if ($status){
                    $count++;
                }
            }
        }

        return $count;
    }
    #page index crawl by xml link
    function indexPageCrawlByRSS(){
        return view('admin_page.crawl.xml.index');
    }
    #crawl page xml
    function CrawlByRSS(Request $request){
        $url = $request->url;
        $context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));
        $xml = file_get_contents($url, false, $context);
        $xml = str_replace('<?xml version="1.0" encoding="utf-16"?>', '<?xml version="1.0" encoding="UTF-8"?>', $xml);
        $xml = simplexml_load_string($xml);
        $contentXML = json_decode( json_encode($xml) , 1);

        return view('ajax.admin.crawl.index_crawl_xml', compact('contentXML'));
    }
}
