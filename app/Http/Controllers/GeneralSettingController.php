<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\GeneralSetting;

class GeneralSettingController extends Controller
{
    // Top Header
    public function topHeader(Request $request)
    {
        $top_header = Generalsetting::findOrFail(1);
        
        if ($request->isMethod('post')) {    
            $data = $request->all();
            $success = $top_header->update($data);
            if ($success) {
                $notification = array(
                    'message' => 'Top Header Updated Successfully ',
                    'alert-type' => 'success'
                );
                return redirect()->route('top-header')->with($notification);
            } else {
                $notification = array(
                    'message' => 'Something Went Wrong!',
                    'alert-type' => 'danger'
                );
                return redirect()->back()->with($notification);
            }
        }
        return view('backend.websettings.generalsettings.top_header.index', compact('top_header'));
    }

    // Address
    public function address(Request $request)
    {
        $address = Generalsetting::findOrFail(1);
        
        if ($request->isMethod('post')) {
            $data = $request->all();
            
            $success = $address->update($data);
            if ($success) {
                $notification = array(
                    'message' => 'Address Updated Successfully ',
                    'alert-type' => 'success'
                );
                return redirect()->route('office-address')->with($notification);
            } else {
                $notification = array(
                    'message' => 'Something Went Wrong!',
                    'alert-type' => 'danger'
                );
                return redirect()->back()->with($notification);
            }
        }
        return view('backend.websettings.generalsettings.address', compact('address'));
    }

    // Logo
    public function logo(Request $request) {
        
        $logo = Generalsetting::findOrFail(1);

        if ($request->isMethod('post')) { 
            $input = $request->all();
            $logo = Generalsetting::findOrFail(1);
            if ($file = $request->file('logo')) {
                $name = time() . $file->getClientOriginalName();
                $file->move('uploads/frontend/image/', $name);
                if ($logo->logo != null) {
                    unlink(public_path() . '/uploads/frontend/image/' . $logo->logo);
                }
                $input['logo'] = $name;
            }
            $logo->update($input);
            if ($logo) {
                $notification = array(
                    'message' => 'Logo Updated Successfully ',
                    'alert-type' => 'success'
                );
                return redirect()->route('main-logo')->with($notification);
            } else {
                $notification = array(
                    'message' => 'Something Went Wrong!',
                    'alert-type' => 'danger'
                );
                return redirect()->back()->with($notification);
            }

        }
        return view('backend.websettings.generalsettings.logo.index', compact('logo'));
    }

    // Popup Banner
    public function PopupBanner(Request $request) {
        
        $popup_banner = Generalsetting::findOrFail(1);

        if ($request->isMethod('post')) { 
            $input = $request->all();

            if ($file = $request->file('popup_banner')) {
                $name = time() . $file->getClientOriginalName();
                // $file->move('uploads/frontend/image/popup-banner/', $name);
                $path = 'uploads/frontend/image/popup-banner/'. $name;
                Image::make($file)->resize(850, 356)->save($path);

                if ($popup_banner->popup_banner != null) {
                    unlink(public_path() . '/uploads/frontend/image/popup-banner/' . $popup_banner->popup_banner);
                }
                $input['popup_banner'] = $name;
            }

            if ($request->banner_status == ""){
                $input['banner_status'] = 0;
            }

            $popup_banner->update($input);
            if ($popup_banner) {
                $notification = array(
                    'message' => 'Popup Banner Updated Successfully ',
                    'alert-type' => 'success'
                );
                return redirect()->route('popup-banner')->with($notification);
            } else {
                $notification = array(
                    'message' => 'Something Went Wrong!',
                    'alert-type' => 'danger'
                );
                return redirect()->back()->with($notification);
            }

        }
        return view('backend.websettings.generalsettings.popup_banner.index', compact('popup_banner'));
    }

    // Website Footer
    public function webfooter(Request $request)
    {
        $website_footer = Generalsetting::findOrFail(1);
        
        if ($request->isMethod('post')) {    
            $data = $request->all();
            $success = $website_footer->update($data);
            if ($success) {
                $notification = array(
                    'message' => 'Website Footer Updated Successfully ',
                    'alert-type' => 'success'
                );
                return redirect()->route('website-footer')->with($notification);
            } else {
                $notification = array(
                    'message' => 'Something Went Wrong!',
                    'alert-type' => 'danger'
                );
                return redirect()->back()->with($notification);
            }
        }
        return view('backend.websettings.generalsettings.website_footer.index', compact('website_footer'));
    }
}
