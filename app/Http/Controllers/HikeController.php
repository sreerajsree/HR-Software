<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hike;
use App\Models\User;
use App\Models\Hiring;
use App\Models\personal_table;
use Alert;
use Illuminate\Support\Facades\Crypt;

class HikeController extends Controller
{
    public function edit($id)
    {
        $user = personal_table::join('hikes', 'hikes.user_id', 'personal_tables.user_id')
            ->select('personal_tables.*', 'hikes.hike_amount', 'hikes.hike_year')
            ->where('personal_tables.id', Crypt::decrypt($id))
            ->get()
            ->first();
        $hike = personal_table::join('users', 'users.id', 'personal_tables.user_id')
            ->join('hikes', 'hikes.user_id', 'users.id')
            ->where('personal_tables.id', Crypt::decrypt($id))
            ->get();
        return view('pages.hike', ['hike' => $hike, 'user' => $user]);
    }

    public function addHike($id)
    {
        $user = personal_table::find($id);
        return view('pages.add-hike', ['user' => $user]);
    }

    public function requestHike(Request $request)
    {
        $hike = new Hike();
        $hike->user_id = $request->user_id;
        $hike->hike_amount = $request->hike_amount;
        $hike->hike_year = $request->hike_year;
        $hike->save();
        Alert::toast('Hike Added Successfully', 'success');
        return redirect()->back();
    }

    public function hiring()
    {
        $hire = Hiring::where('status', 0)->get();
        $scheduled = Hiring::where('status', 1)->get();
        $selected = Hiring::where('status', 3)->get();
        $rejected = Hiring::where('status', 4)->get();
        $joined = Hiring::where('status', 5)->get();
        return view('pages.hiring', ['hire' => $hire, 'scheduled' => $scheduled, 'selected' => $selected, 'rejected' => $rejected, 'joined' => $joined]);
    }

    public function addCandidate(Request $request)
    {
        $hire = new Hiring();
        $hire->name = $request->name;
        $hire->email = $request->email;
        $hire->contact = $request->contact;
        $hire->skills = $request->skills;
        $hire->comments = $request->comments;
        $hire->status = 0;
        $hire->save();
        Alert::toast('Candidate Added Successfully', 'success');
        return redirect()->back();
    }

    public function moveScheduled($id)
    {
        $hire = Hiring::find($id);
        $hire->status = 1;
        $hire->save();
        Alert::toast('Application moved to Scheduled', 'success');
        return redirect()->back();
    }

    public function updateCandidate(Request $request, $id)
    {
        $request->validate([
            'resume' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048',
        ]);

        $hire = Hiring::find($id);
        if ($request->hasfile('resume')) {
            $file = $request->file('resume');
            $name = $file->getClientOriginalName();
            $file->move(public_path() . '/Resumes/', $name);
            $hire->resume = $name;
            $hire->date_of_interview = $request->date_of_interview;
            $hire->team = $request->team;
            $hire->comments = $request->comments;
            $hire->save();
            Alert::toast('Added Date & Time of Inteview Successfully', 'success');
            return redirect()->back();
        }
    }

    public function moveSelected($id)
    {
        $hire = Hiring::find($id);
        $hire->status = 3;
        $hire->save();
        Alert::toast('Application Selected', 'success');
        return redirect()->back();
    }

    public function moveRejected($id)
    {
        $hire = Hiring::find($id);
        $hire->status = 4;
        $hire->save();
        Alert::toast('Application Rejected', 'success');
        return redirect()->back();
    }

    public function moveJoined($id)
    {
        $hire = Hiring::find($id);
        $hire->status = 5;
        $hire->save();
        Alert::toast('Application Moved to Joined', 'success');
        return redirect()->back();
    }
}
