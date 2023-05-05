<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Alert;
use Hash;

class ProfileController extends Controller
{
    public function viewprofile()
    {
        $user = User::join('personal_tables', 'personal_tables.user_id', '=', 'users.id')
            ->where('users.id', auth()->user()->id)
            ->get()
            ->first();

        return view('pages.profile', compact('user'));
    }

    // public function fileUpload(Request $req)
    // {
    //     $req->validate([
    //         'image' => 'mimes:jpeg,jpg,png,webp|max:2048',
    //     ]);

    //     if ($req->hasfile('image')) {
    //         $file = $req->file('image');
    //         $name = $file->getClientOriginalName();
    //         $file->move(public_path() . '/ProfileImages/', $name);
    //         $imgData = $name;

    //         $fileModal = User::where('id', auth()->user()->id)->update(['profile_pic' => $imgData]);

    //         Alert::toast('Profile Picture Updated Successfully', 'success');
    //         return redirect()->back();
    //     }
    // }

    public function imageCropPost(Request $request)
    {
        $data = $request->image;

        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);

        $data = base64_decode($data);
        $image_name = time() . '.png';
        $path = public_path() . "/ProfileImages/" . $image_name;
        $imgData = $image_name;
        $fileModal = User::where('id', auth()->user()->id)->update(['profile_pic' => $imgData]);
        file_put_contents($path, $data);

        return response()->json(['success' => 'Profile Picture Added Successfully.']);
    }

    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);
        #Match The Old Password
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with('error', "Old Password Doesn't match!");
        }
        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('status', 'Password changed successfully!');
    }
}
