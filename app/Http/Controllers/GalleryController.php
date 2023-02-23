<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Alert;
use Auth;

class GalleryController extends Controller
{
    public function gallery()
    {
        $galleries = Gallery::all()->whereNotNull('name');
        $users = auth()->user();
        $count = Gallery::distinct()->count('event');
        $events = Gallery::distinct()->whereNotNull('name')->get(['event']);
        
        return view('pages.gallery', compact('users', 'galleries', 'events', 'count'));
    }

    public function AddEvent(Request $req)
    {
        $req->validate([
            'Event' => 'required',
        ]);
        //have to work
    }

    public function del(Request $req)
    {
        //$data = Gallery::find(($name));
        $galleries = Gallery::where('id', $req->id )->get(['name']);
        $ImageName= $galleries[0]['name'];
        $DeleteImage=$req->Image;
        $i=0;
        //$afterDelete= str_replace(",\"\",",',', $ImageName);
        $afterDelete= str_replace("[",'', $ImageName);
        $afterDelete= str_replace("]",'', $afterDelete);
        $afterDelete= str_replace("\"",'', $afterDelete);
        $nameArr=  explode(',', $afterDelete);
        echo $ImageName;
        echo "<br/>";
        for ($x = 0; $x <= sizeof($nameArr); $x++) {
            if($DeleteImage== $nameArr[$x]){
                unset($nameArr[$x]);
                break;
            }
        }
        $filename = $DeleteImage;
        if (file_exists(public_path() . '/Gallery/'.$filename)) {
            unlink(public_path() . '/Gallery/'.$filename);
        }
        if (sizeof($nameArr)>0) {
            $StringAfterDelete = "[\"" . implode("\",\"", $nameArr) . "\"]";
            Gallery::where('id', $req->id)->update(['name' => $StringAfterDelete]);
        }else{
            Gallery::where('id', $req->id)->delete();
        }
        
        
        Alert::toast('Image deleted successfully', 'success');
        return redirect()->back();
    }

    public function delEvent(Request $req)
    {
        if (Auth::user()->status == 0)
            Gallery::where('event', $req->event)->delete();
        Alert::toast('Image deleted successfully', 'success');
        return redirect()->back();
    }

    
    public function fileUpload(Request $req)
    {
        
        $req->validate([
            'imageFile' => 'required',
            'EventNeme'=>'required',
            'imageFile.*' => 'mimes:jpeg,jpg,png,webp|max:2048',
        ]);

        if ($req->hasfile('imageFile')) {
            foreach ($req->file('imageFile') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/Gallery/', $name);
                $imgData[] = $name;
            }
            $fileModal = new Gallery();
            $fileModal->name = json_encode($imgData);
            $fileModal->user_id = auth()->user()->id;
            $fileModal->image_path = json_encode($imgData);
            $fileModal->event =$req-> EventNeme;
            $fileModal->save();

            Alert::toast('Images Added Successfully', 'success');
            return redirect()->back();
        }
    }
}