<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\Notice;
use App\Models\Slider;
use File;
use Image;


class SettingsController extends Controller
{
    //Whole manage at a glance
    public function index(){
        $sliders = Slider::where('status',1)->get();
        $logo = Settings::where('status',1)->where('type',2)->get();
        $favicon = Settings::where('status',1)->where('type',1)->get();
        $footer = Settings::where('status',1)->where('type',3)->get();
        // dd($sliders,$logo,$favicon,$footer);
        return view('backend.pages.settings.manage',compact('sliders','logo','footer','favicon'));
    }

    //logo, favicon, footer icon start
    public function logoIndex(){
        $images = Settings::get();
        return view('backend.pages.settings.image.manage',compact('images'));
    }
    public function logoCreate(){
        return view('backend.pages.settings.image.add');
    }

    //All kind of image upload and delete [Start]
    public function logoAdd(Request $request){
        $data = new Settings;
        // dd($request->file('logo')->getClientOriginalExtension());
        if($request->logo){

            $image = $request->file('logo');
            $img = time() . '.' . $image->getClientOriginalExtension();

            if($request->type == 1){
                $location = public_path('frontend/assets/settings/favicon/' . $img);
            }else if($request->type == 2){
                $location = public_path('frontend/assets/settings/logo/' . $img);
            }else if($request->type == 3){
                $location = public_path('frontend/assets/settings/footer/' . $img);
            }

            Image::make($image)->save($location);
            $data->image = $img;
        }
        $data->type = $request->type;
        $data->status = $request->status;
        $data->save();
        $notification = array(
            'alert-type'    => 'success',
            'message'       => 'A New Ecommerce Logo Updated Successfully'
        );

        return redirect()->route('settings.logo.manage')->with($notification);
        
    }

    public function logoEdit(Request $request,$id){
        $data = Settings::find($id);
        return view('backend.pages.settings.logo.edit',compact('data'));
    }

    public function logoUpdate(Request $request,$id){
        $data = Settings::find($id);
        $data->status = $request->status;
        if($request->logo){
            if ( File::exists('frontend/assets/settings/logo/' . $data->image_name ) ){
                File::delete('frontend/assets/settings/logo/' . $data->image_name);
            }
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

        return redirect()->route('settings.logo')->with($notification);
    }

    public function logoDelete(Request $request,$id){
        $data = Settings::find($id);
        // Delete Existing Image
        if ( File::exists('frontend/assets/settings/logo/' . $data->image_name) ){
            File::delete('frontend/assets/settings/logo/' . $data->image_name);
        }
        $data->delete();
        $notification = array(
            'alert-type'    => 'info',
            'message'       => 'A New Ecommerce Logo deleted Successfully'
        );

        return redirect()->route('settings.logo')->with($notification);
    }
    //logo, favicon, footer icon end

    //Notice Start
    public function noticeIndex(){
        $notices = Notice::get();
        return view('backend.pages.settings.notice.manage',compact('notices'));
    }   
    public function noticeCreate(){
        return view('backend.pages.settings.notice.add');
    }
    public function noticeStore(Request $request){
        // dd($request);
        $notice = new Notice;
        $notice->notice = $request->notice;
        $notice->status = $request->status;
        $notice->save();
        $notification = array(
            'alert-type'    => 'success',
            'message'       => 'A new ecommerce notice added Successfully'
        );

        return redirect()->route('settings.notice.manage')->with($notification);
    }
    public function noticeEdit(Request $request,$id){
        $notice = Notice::find($id);
        return view('backend.pages.settings.notice.edit',compact('notice'));
    }
    public function noticeUpdate(Request $request,$id){
        $notice = Notice::find($id);
        $notice->notice = $request->notice;
        $notice->status = $request->status;
        $notice->save();
        $notification = array(
            'alert-type'    => 'info',
            'message'       => 'A ecommerce notice updated Successfully'
        );

        return redirect()->route('settings.notice.manage')->with($notification);
    }
    public function noticeDelete(Request $request,$id){
        $notice = Notice::find($id);
        $notice->delete();
        $notification = array(
            'alert-type'    => 'error',
            'message'       => 'A ecommerce notice deleted Successfully'
        );

        return redirect()->route('settings.notice.manage')->with($notification);
    }

    //Notice End

    //Slider Start
    public function sliderIndex(){
        $sliders = Slider::get();
        return view('backend.pages.settings.slider.manage',compact('sliders'));
    }
    public function sliderCreate(){
        return view('backend.pages.settings.slider.add');
    }
    public function sliderStore(Request $request){
        // dd($request->image->getClientOriginalExtension());exit();
        $slider = new Slider;
        $slider->head = $request->head;
        $slider->subHead = $request->subHead;
        $slider->status = $request->status;
        if($request->image){

            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('frontend/assets/settings/slider/' . $img);
            Image::make($image)->save($location);
            $slider->image = $img;
        }
        $slider->save();
        $notification = array(
            'alert-type'    => 'success',
            'message'       => 'A ecommerce slider created Successfully'
        );

        return redirect()->route('settings.slider.manage')->with($notification);
    }  
    public function sliderEdit(Request $request,$id){
        $slider = Slider::find($id);
        return view('backend.pages.settings.slider.edit',compact('slider'));
    } 
    public function sliderUpdate(Request $request,$id){
        $slider = Slider::find($id);
        $slider->head = $request->head;
        $slider->subHead = $request->subHead;
        $slider->status = $request->status;
        if($request->image){
            if ( File::exists('frontend/assets/settings/slider/' . $slider->image) ){
                File::delete('frontend/assets/settings/slider/' . $slider->image);
            }
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('frontend/assets/settings/slider/' . $img);
            Image::make($image)->save($location);
            $slider->image = $img;
        }
        $slider->save();
        $notification = array(
            'alert-type'    => 'info',
            'message'       => 'A ecommerce slider updated Successfully'
        );

        return redirect()->route('settings.slider.manage')->with($notification);
    }
    public function sliderDelete($id){
        $slider = Slider::find($id);
        if ( File::exists('frontend/assets/settings/slider/' . $slider->image) ){
            File::delete('frontend/assets/settings/slider/' . $slider->image);
        }
        $slider->delete();
        $notification = array(
            'alert-type'    => 'error',
            'message'       => 'A ecommerce slider deleted Successfully'
        );

        return redirect()->route('settings.slider.manage')->with($notification);
    }
    //Slider End
}
