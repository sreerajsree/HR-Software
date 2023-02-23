<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hike;
use App\Models\User;
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
            ->get()->first();
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
}
