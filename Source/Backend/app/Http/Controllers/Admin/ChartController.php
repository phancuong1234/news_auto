<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\User;
use App\Models\News;
use App\Models\Comment;
use App\Models\Category;
use Carbon\Carbon;

class ChartController extends Controller
{	

    public function index()
    {
	    return view('admin_page.charts.UserChart',compact('year'));
    }
    # data chart count user in year
    public function countUser(){
		$users = User::whereYear('created_at', date('Y'))
				->select('id', 'created_at')
				->get()
				->groupBy(function($date) {
	    		return Carbon::parse($date->created_at)->format('m'); // grouping by months
		});
		$usermcount = [];
		foreach ($users as $key => $value) {
		    $usermcount[(int)$key] = count($value);
		}

    	return json_encode($usermcount);
    }
	
	#count user in five year ago
	public function countUserByYear($year){
		$user = User::whereYear('created_at', '=', $year)
					->select('id', 'created_at')
					->get()
					->groupBy(function($date) {
						return Carbon::parse($date->created_at)->format('m'); // grouping by months
				});
		$countuserbyyear = [];
		foreach ($user as $key => $value) {
		    $countuserbyyear[(int)$key] = count($value);
		}

		return json_encode($countuserbyyear);
	}

	
    public function indexView()
    {
	    return view('admin_page.charts.ChartView');
    }
    # data chart count view in year
    public function countView(){
		$view = News::whereYear('created_at', date('Y'))
				->select('number_view', 'created_at')
				->get()
				->groupBy(function($date) {
	    		return Carbon::parse($date->created_at)->format('m'); // grouping by months
		});
		$viewcount = [];
		foreach ($view as $key => $value) {
			$count = 0;
			foreach($value as $number){
				$count += $number->number_view;
			}
			$viewcount[(int)$key] = $count;
		}

    	return json_encode($viewcount);
    }

	public function ChartViewByCategory()
    {
		$viewByCate = News::join('categories','news.id_category','=','categories.id')
					->whereYear('news.created_at',date('Y'))
					->select(DB::raw("SUM(news.number_view)as total,categories.name_category as name"))
					->groupBy('news.id_category')
					->get();
		$countViewByCate = [];
		foreach ($viewByCate as $key => $value) {
			$countViewByCate[$key]['name'] = $value->name;
			$countViewByCate[$key]['total'] = $value->total;
		}
		return json_encode($countViewByCate);
	}
	
	public function countViewByYear($year){
		$view = News::whereYear('created_at', $year)
					->select('number_view', 'created_at')
					->get()
					->groupBy(function($date) {
						return Carbon::parse($date->created_at)->format('m'); // grouping by months
				});
		$countviewbyyear = [];
			foreach ($view as $key => $value) {
				$count = 0;
				foreach($value as $number){
					$count += $number->number_view;
				}
				$countviewbyyear[(int)$key] = $count;
			}
		
		return json_encode($countviewbyyear);
		
	}

    public function indexComment()
    {
		
	    return view('admin_page.charts.ChartComment');
    }

    public function countComment(){
    	$comment = Comment::select('id_news', 'created_at')
    			->get()
    			->groupBy(function($date) {
	    		return Carbon::parse($date->created_at)->format('m');
			});
		$commentcount = [];
		foreach ($comment as $key => $value) {
		    $commentcount[(int)$key] = count($value);
		}

    	return json_encode($commentcount);
    }

    public function commentChartByMonth($month){
		$view = Comment::where(DB::raw('MONTH(comments.created_at)'), $month)
					->join('news', 'news.id', '=', 'comments.id_news')
					->select('comments.id_news', 'news.title', 'comments.id_user', DB::raw('COUNT(comments.id) as total'))
					->groupBy('comments.id_news', 'comments.id_user')
					->orderBy(DB::raw('COUNT(comments.id)'), 'DESC')
					->limit(config('setting.chart.limit-top-10'))
					->get();
		$data = array();
		foreach($view as $key => $value){
			$username = User::join('news', 'news.id_user', '=', 'users.id')->where('news.id', $value->id_news)->first();
			$data[$key]['id_new'] = $value->id_news;
			$data[$key]['title'] = $value->title;
			$data[$key]['total'] = $value->total;
			$data[$key]['username'] = $value->username;

		}

		return json_encode($data);
    }

    public function indexArticle()
    {
		$category = Category::select('id', 'name_category')->get();
		
    	return view('admin_page.charts.ChartArticle', compact('category'));
    }

    public function countArticle()
    {
		$totalNews = News::whereYear('created_at',date('Y'))
				->get()
    			->groupBy(function($date) {
	    		return Carbon::parse($date->created_at)->format('m');
	    	});
    	$countarticle = [];
    	foreach ($totalNews as $key => $value) {
    		$countarticle[(int)$key] = count($value);
    	}

		return json_encode($countarticle);
    }

    public function ChartArticleByCategory($id)
    {
		$Article = News::where('id_category',$id)
				->get()
				->groupBy(function($date) {
					return Carbon::parse($date->created_at)->format('m');
				});
		$countArticleByCate = [];
		foreach ($Article as $key => $value) {
    		$countArticleByCate[(int)$key] = count($value);
		}

		return json_encode($countArticleByCate);
	}
	
	public function ChartArticleByYear($year){
		$ArticleByYear = News::whereYear('created_at',$year)
					->get()
					->groupBy(function($date) {
						return Carbon::parse($date->created_at)->format('m');
					});
		$countArticleByYear = [];
		foreach ($ArticleByYear as $key => $value) {
    		$countArticleByYear[(int)$key] = count($value);
		}
		
		return json_encode($countArticleByYear);
	}

	public function indexArticleRate()
	{
		return view('admin_page.charts.ChartArticleRate');
	}

	public function countArticleRate()
	{
		$articlerate = News::select(DB::raw('categories.name_category AS name , COUNT(news.id) AS total'))
				->join('categories','news.id_category','=','categories.id')
				->whereYear('news.created_at',date('Y'))
				->groupBy('news.id_category')
				->get();
		$countArticleRate = [];
		$total = 0;
		foreach ($articlerate as $key => $value) {
				$total += $value->total;
				$countArticleRate[$key]['name'] = $value->name;
				$countArticleRate[$key]['total'] = $value->total;
				
		}
		foreach($countArticleRate as $key => $value){
			$countArticleRate[$key]['countall'] = $total;
		}

		return json_encode($countArticleRate);

	}

	public function indexArticleTopView(){
		return view('admin_page.charts.ChartArticleTopView');
	}

	public function topViewArt(){
		$topview = News::whereYear('created_at',date('Y'))
				->select('id','number_view')
				->orderBy('number_view','DESC')
				->limit(config('setting.chart.limit-top-10'))
				->get();
		$topviewArr = [];
		foreach($topview as $key => $value){
			$topviewArr[$key]['id'] = $value->id;
			$topviewArr[$key]['view']  = $value->number_view;
		}
		
		return json_encode($topviewArr);
	}

	public function topViewArtChooseTime($year, $month ,$amount){
		if($month != '0'){
			$topviewchoosetime = News::whereYear('created_at',$year)
				->whereMonth('created_at',$month)
				->select('id','number_view')
				->orderBy('number_view','DESC')
				->limit($amount)
				->get();
		}
		else{
			$topviewchoosetime = News::whereYear('created_at',$year)
				->select('id','number_view')
				->orderBy('number_view','DESC')
				->limit($amount)
				->get();
		}
		$topviewchoosetimeArr = [];
		foreach($topviewchoosetime as $key => $value){
			$topviewchoosetimeArr[$key]['id'] = $value->id;
			$topviewchoosetimeArr[$key]['view']  = $value->number_view;
		}	
		
		return json_encode($topviewchoosetimeArr);
	}

	public function indexChartTopMod(){

		return view('admin_page.charts.ChartTopMod');
	}

	public function topBTV(){
		$topBTV = News::join('users','news.id_user','=','users.id')	
					->whereNull('news.url_news')
					->whereYear('news.created_at',date("Y"))
					->select('users.username',DB::raw("COUNT(news.id) as total"))
					->groupBy('news.id_user')
					->limit(config('setting.chart.limit-top-10'))
					->orderBy('total','DESC')
					->get();
		$topMod = [];
		foreach ($topBTV as $key => $value) {
			$topMod[$key]['name'] = $value->username;
			$topMod[$key]['total'] = $value->total;
		}
		return json_encode($topMod);
	}

	public function topModChooseTime($year, $month ,$amount){
		if($month != config('setting.chart.isset-month')){
			$topmodchoosetime = News::whereYear('news.created_at',$year)
				->whereMonth('news.created_at',$month)
				->join('users','news.id_user','=','users.id')
				->select('users.username',DB::raw("COUNT(news.id) as total"))
				->groupBy('news.id_user')
				->orderBy('total','DESC')
				->limit($amount)
				->get();
		}
		else{
			$topmodchoosetime = News::whereYear('news.created_at',$year)
				->join('users','news.id_user','=','users.id')
				->select('users.username',DB::raw("COUNT(news.id) as total"))
				->groupBy('news.id_user')
				->orderBy('total','DESC')
				->limit($amount)
				->get();
		}
		$topmodchoosetimeArr = [];
		foreach($topmodchoosetime as $key => $value){
			$topmodchoosetimeArr[$key]['username'] = $value->username;
			$topmodchoosetimeArr[$key]['total']  = $value->total;
		}	
		
		return json_encode($topmodchoosetimeArr);
	}
}
