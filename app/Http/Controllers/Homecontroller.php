<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\update;
use Image;
use File;

class Homecontroller extends Controller
{

////////////////////////////////////////////////IMAGE RESIZE///////////////////////////////////////////////////
    public function imgcompression() {
        return view("imgcompression");
    }

    public function imgCompress (Request $request){
       
        $filepath2 = "";
        if($request->file('profile_image') != ""){
            $file2 = $request->file('profile_image');
            $extension = $file2->getClientOriginalExtension();
            $filepath2 = time()."." . $extension;

            Image::make($file2)
            ->resize(250, 250)
            ->save(public_path('memberPhoto/') . $filepath2);
            // $file2->move('memberPhoto/', $filepath2);
        }
        $newDate = date("Y-m-d", strtotime($request->Dob));  
        $tab2 = DB::table("image_compressions");
        $data = array(
            "profile_image" => $filepath2,
            "created_at" =>date("Y-m-d")
          
        );
        $save = $tab2->insert($data);
        if($save){
            session()->flash('message', 'Registration Successfully Done..!');
            return redirect()->back();
        }
        else{
            session()->flash('message', 'Registration Faild ...!');
            return redirect()->back();
        }


    }


////////////////////////////////////////////////IMAGE COMPRESSION///////////////////////////////////////////////////


    public function imageCompressed() {
        return view("imageCompressed");
    }

    public function FormimageCompressed (Request $request){
       
        $filepath2 = "";
        if($request->file('image') != ""){
            $file2 = $request->file('image');
            $extension = $file2->getClientOriginalExtension();
            $filepath2 = time()."." . $extension;
            $file2->move('compressPhoto/', $filepath2);
        }
        $newDate = date("Y-m-d", strtotime($request->Dob));  
        $tab2 = DB::table("image_compresseds");
        $data = array(
            "image" => $filepath2,
            "created_at" =>date("Y-m-d")
          
        );
        $save = $tab2->insert($data);
        if($save){
            session()->flash('message', 'Registration Successfully Done..!');
            return redirect()->back();
        }
        else{
            session()->flash('message', 'Registration Faild ...!');
            return redirect()->back();
        }


    }



}
