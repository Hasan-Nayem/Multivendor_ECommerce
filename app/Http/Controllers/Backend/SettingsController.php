<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SettingsImage;
use File;
use Image;


class SettingsController extends Controller
{
    public function index(){
        return view('backend.pages.settings.manage');
    }

    public function logoIndex(){
        $all = SettingsImage::get()->where('image_type',1);
        return view('backend.pages.settings.logo.manage');
    }

    //All kind of image upload and delete [Start]
    public function logoAdd(Request $request){
        $data = new SettingsImage;
        // dd($request->file('logo')->getClientOriginalExtension());
        if($request->logo){

            $image = $request->file('logo');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('frontend/assets/settings/logo/' . $img);
            Image::make($image)->save($location);
            $data->image_name = $img;
        }
        $data->image_type = 1;
        $data->status = $request->status;
        $data->save();
        $notification = array(
            'alert-type'    => 'success',
            'message'       => 'A New Ecommerce Logo Updated Successfully'
        );

        return redirect()->route('settings.all')->with($notification);
        
    }

    
}
