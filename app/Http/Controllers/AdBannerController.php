<?php

namespace App\Http\Controllers;

use App\AdBanner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use File;

class AdBannerController extends Controller
{
    public function index(Request $request)
    {
        $ad_banners = AdBanner::findOrFail(1);

        if ($request->isMethod('post')) { 
            $input = $request->all();

            if ($file = $request->file('first_image')) {
                $name = time() . $file->getClientOriginalName();
                $path = 'uploads/frontend/image/ad-banner/'. $name;
                Image::make($file)->resize(570, 220)->save($path);

                if ($ad_banners->first_image != null) {
                    unlink(public_path() . '/uploads/frontend/image/ad-banner/' . $ad_banners->first_image);
                }
                $input['first_image'] = $name;
            }

            if ($file = $request->file('second_image')) {
                $name = time() . $file->getClientOriginalName();
                $path = 'uploads/frontend/image/ad-banner/'. $name;
                Image::make($file)->resize(570, 220)->save($path);

                if ($ad_banners->second_image != null) {
                    unlink(public_path() . '/uploads/frontend/image/ad-banner/' . $ad_banners->second_image);
                }
                $input['second_image'] = $name;
            }

            if ($request->status == ""){
                $input['status'] = 0;
            }

            $ad_banners->update($input);
            if ($ad_banners) {
                $notification = array(
                    'message' => 'Ad Banner Updated Successfully ',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'message' => 'Something Went Wrong!',
                    'alert-type' => 'danger'
                );
                return redirect()->back()->with($notification);
            }

        }

        return view('backend.websettings.homepagesettings.ad_banner.index', compact('ad_banners'));
    }

































    public function destroy($id)
    {
        $AdBannerDelete = AdBanner::find($id);
        if (!is_null($AdBannerDelete)) {
            if (File::exists('uploads/frontend/image/ad-banner/'.$AdBannerDelete->first_image)) {
                File::delete('uploads/frontend/image/ad-banner/'.$AdBannerDelete->first_image);
            }
            if (File::exists('uploads/frontend/image/ad-banner/'.$AdBannerDelete->second_image)) {
                File::delete('uploads/frontend/image/ad-banner/'.$AdBannerDelete->second_image);
            }

        $dlt = $AdBannerDelete->delete();
            if ($dlt) {
                    $notification=array(
                     'message' => 'Ad Banner Deleted Successfully',
                     'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                }
            else
                {
                    $notification=array(
                    'message' => 'Something Went wrong!',
                    'alert-type' => 'danger'
                    );
                    return redirect()->back()->with($notification);
                }
        }
    }
}
