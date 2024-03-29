<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\personal_table;
use Auth;
use Alert;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function index()
    {

        $myattendance = Attendance::join('personal_tables', 'personal_tables.user_id', 'attendances.empcode')->where('empcode', Auth::user()->id)->orderBy('date', 'DESC')->get();

        return view('pages.attendance', compact('myattendance'));
    }

    public function timeOut()
    {

        if (Auth::user()->shift == "IN") {
            $timeout = Attendance::where('empcode', Auth::user()->id)->latest('id')->get()->first();
            $timeout->time_out = \now();
            $timeout->save();
            request()->session()->put('attendance', $timeout);
            Alert::toast('Time Out Successfull', 'success');
            return redirect()->route('home');
        } elseif (Auth::user()->shift == "US") {
            $timeout = Attendance::where('empcode', Auth::user()->id)->latest('id')->get()->first();
            $timeout->time_out = Carbon::now('America/Los_Angeles');
            $timeout->save();
            request()->session()->put('attendance', $timeout);
            Alert::toast('Time Out Successfull', 'success');
            return redirect()->route('home');
        }
    }
}
