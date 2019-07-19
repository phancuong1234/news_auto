<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Date;
use DateTime;

class NotifyController extends Controller
{
    public function loadLimit()
    {
        $notify = DatabaseNotification::where('notifiable_id', Auth::user()->id)->orderBy('created_at', 'desc')->limit(3)->get();

        return $notify;
    }

    public function numberNotifyUnread()
    {
        $notify = DatabaseNotification::where([['notifiable_id', '=', Auth::user()->id], ['read_at', '=', null]])->get()->count();

        return $notify;
    }

    public function readNotification($id)
    {
        DatabaseNotification::where('id', $id)->update(['read_at' => now()]);
    }

    public function loadOneNotify($id)
    {
        $notify = DatabaseNotification::where('id', $id)->orderBy('created_at', 'desc')->first();

        return $notify;
    }

    public function index()
    {
        $listNotify = DatabaseNotification::where('notifiable_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(config('setting.paginate'));
        foreach ($listNotify as $key => $value) {
            $listNotify[$key]['created_at_format'] = $this->reFormatDateTime($value->created_at);
        }
        
        return view('admin_page.notify.index', compact('listNotify'));
    }

    // lấy thứ ngày
    public function getNameDay($day)
    {
        switch ($day) {
            case 'Mon':
                return 'Thứ 2';
                break;
            case 'Tue':
                return 'Thứ 3';
                break;
            case 'Wed':
                return 'Thứ 4';
                break;
            case 'Thu':
                return 'Thứ 5';
                break;
            case 'Fri':
                return 'Thứ 6';
                break;
            case 'Sat':
                return 'Thứ 7';
                break;
            default:
                echo 'Chủ Nhật';
                break;
        }
    }

    public function reFormatDateTime($input){
        $nameDate = $this->getNameDay(date('D', strtotime($input)));
        $now = Carbon::now();
        $dateDiff = $input->diff($now)->format('%r%a');
        if($dateDiff > 7){
            return date('H:m d-m-Y',strtotime($input));
        }
        else if($dateDiff >= 1 && $dateDiff <= 7) {
            return date('H:m',strtotime($input)).' '.$nameDate;
        }
        else {
            return 'Hôm nay '.date('H:m',strtotime($input));
        }
    }
}
