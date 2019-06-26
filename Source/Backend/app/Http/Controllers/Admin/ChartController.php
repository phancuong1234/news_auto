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
	    return view('admin_page.charts.UserChart');
    }
    # data chart count user in year
    public function countUser(){
    	$users = User::select('id', 'created_at')->get()->groupBy(function($date) {
	    		return Carbon::parse($date->created_at)->format('m'); // grouping by months
		});
		$usermcount = [];
		$userArr = [];
		foreach ($users as $key => $value) {
		    $usermcount[(int)$key] = count($value);
		}
		for($i = 1; $i <= 12; $i++){
		    if(!empty($usermcount[$i])){
		        $userArr[$i] = $usermcount[$i];    
		    }else{
		        $userArr[$i] = 0;    
		    }
		}
		$userArrFormat = [];
		foreach ($userArr as $key => $value) {
			array_push($userArrFormat, $value);
		}

    	return json_encode($userArrFormat);
    }

    public function indexView()
    {
	    return view('admin_page.charts.ChartView');
    }
    # data chart count view in year
    public function countView(){
    	$view = News::select('number_view', 'created_at')->get()->groupBy(function($date) {
	    		return Carbon::parse($date->created_at)->format('m'); // grouping by months
		});
		$viewcount = [];
		$viewarr = [];
		foreach ($view as $key => $value) {
			$count = 0;
			foreach($value as $number){
				$count += $number->number_view;
			}
			$viewcount[(int)$key] = $count;
		}
		for($i = 1; $i <= 12; $i++){
		    if(!empty($viewcount[$i])){
		        $viewarr[$i] = $viewcount[$i];    
		    }else{
		        $viewarr[$i] = 0;    
		    }
		}
		$viewArrFormat = [];
		foreach ($viewarr as $key => $value) {
			array_push($viewArrFormat, $value);
		}	
    	return json_encode($viewArrFormat);
    }

    public function indexComment()
    {
	    return view('admin_page.charts.ChartComment');
    }

    public function countComment(){
    	$comment = Comment::select('id_new', 'created_at')
    			->get()
    			->groupBy(function($date) {
	    		return Carbon::parse($date->created_at)->format('m');
	    	});
		$commentcount = [];
		$commentArr = [];
		foreach ($comment as $key => $value) {
		    $commentcount[(int)$key] = count($value);
		}
		for($i = 1; $i <= 12; $i++){
		    if(!empty($commentcount[$i])){
		        $commentArr[$i] = $commentcount[$i];    
		    }else{
		        $commentArr[$i] = 0;    
		    }
		}
		$commentArrFormat = [];
		foreach ($commentArr as $key => $value) {
			array_push($commentArrFormat, $value);
		}

    	return json_encode($commentArrFormat);
    }

    public function commentChartByMonth($month){
		$view = Comment::where(DB::raw('MONTH(comments.created_at)'), $month)
			->join('news', 'news.id', '=', 'comments.id_new')
			->select('comments.id_new', 'news.title', 'comments.id_user', DB::raw('COUNT(comments.id) as total'))
			->groupBy('comments.id_new', 'comments.id_user')
			->orderBy(DB::raw('COUNT(comments.id)'), 'DESC')
			->limit(10)
			->get();
		$data = array();
		foreach($view as $key => $value){
			$username = User::join('news', 'news.id_user', '=', 'users.id')->where('news.id', $value->id_new)->first();
			$data[$key]['id_new'] = $value->id_new;
			$data[$key]['title'] = $value->title;
			$data[$key]['total'] = $value->total;
			$data[$key]['username'] = $username->username;

		}

		return json_encode($data);
    }

    public function indexArticle()
    {
    	$category = Category::select('id','name_category')->get();
    	return view('admin_page.charts.ChartArticle',compact('category'));
    }

    public function countArticle()
    {
    	$totalNews = News::get()
    			->groupBy(function($date) {
	    		return Carbon::parse($date->created_at)->format('m');
	    	});
    	$countarticle = [];
    	$articleArr = [];
    	foreach ($totalNews as $key => $value) {
    		$countarticle[(int)$key] = count($value);
    	}
    	
    	for($i = 1; $i <= 12; $i++){
		    if(!empty($countarticle[$i])){
		        $articleArr[$i] = $countarticle[$i];    
		    }else{
		        $articleArr[$i] = 0;    
		    }
		}

		$articleArrFormat = [];
		foreach ($articleArr as $key => $value) {
			array_push($articleArrFormat, $value);
		}

		return json_encode($articleArrFormat);
    }

    public function ChartArticleByCategory($id)
    {
		$Article = News::where('id_category',$id)
				->get()
				->groupBy(function($date) {
					return Carbon::parse($date->created_at)->format('m');
				});
		$countArticleByMonth = [];
		$articleArr = [];
		foreach ($Article as $key => $value) {
    		$countArticleByMonth[(int)$key] = count($value);
		}
		for($i = 1; $i <= 12; $i++){
		    if(!empty($countArticleByMonth[$i])){
		        $articleArr[$i] = $countArticleByMonth[$i];    
		    }else{
		        $articleArr[$i] = 0;    
		    }
		}
		$articleArrFormat = [];
		foreach ($articleArr as $key => $value) {
			array_push($articleArrFormat, $value);
		}

		return json_encode($articleArrFormat);
	}
	
	public function indexArticleRate()
	{
		return view('admin_page.charts.ChartArticleRate');
	}

	public function countArticleRate()
	{
		$articlerate = News::select(DB::raw('categories.name_category AS name , COUNT(news.id) AS total'))
				->join('categories','news.id_category','=','categories.id')
				->groupBy('news.id_category')
				->get();
		$countArticleRate = [];
		foreach ($articlerate as $key => $value) {
			$countArticleRate[$key]['name'] = $value->name;
			$countArticleRate[$key]['total'] = $value->total;
		}
		dd($countArticleRate);
		return json_encode($countArticleRate);

	}

}
