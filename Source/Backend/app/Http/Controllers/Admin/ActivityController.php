<?php

namespace App\Http\Controllers\Admin;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    public function index(){
        $listActivities = Activity::leftJoin('news', 'news.id', '=', 'activities.id_news')
            ->select('activities.*', 'news.title')
            ->where('activities.id_user', Auth::user()->id)->paginate(config('setting.paginate'));
        return view('admin_page.activity.index', compact('listActivities'));
    }
    public function getSearchAjax($text)
    {
        if(isset($text))
        {
            $listActivities = Activity::leftJoin('news', 'news.id', '=', 'activities.id_news')
                ->select('activities.*', 'news.title')
                ->where('activities.content', 'LIKE', "%{$text}%")
                ->orWhere('news.title', 'LIKE', "%{$text}%")
                ->paginate(config('setting.paginate'));

            return view('ajax.admin.activity.search', compact('listActivities'));
        }
    }
}
