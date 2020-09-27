<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use Intervention\Image\Facades\Image;
use File;

class SliderController extends Controller
{
    public function index(Request $request)
    {
        $sliders = Slider::orderby('priority', 'asc')->get();
        
        if ($request->isMethod('post')){
            
            $rules = [
                'title' => 'unique:sliders|string',
                'category_url' => 'unique:sliders|string',
                'image' => 'image|mimes:jpeg,jpg,png,gif',
                'priority' => 'unique:sliders|integer',
                'status' => 'required',
            ];
            $customMessages = [
                'title.unique' => 'This Title has been used already.',
                'title.string' => 'This Title must have a word.',
                'image.image' => 'Upload a Image',
                'image.mimes' => 'Upload a valid Image',
                'priority.unique' => 'Priority has been set',
                'priority.integer' => 'Priority must be a number',
                'status.required' => 'Status is required',
            ];
            $this->validate($request, $rules, $customMessages);

            $slider = new Slider;
            $slider->title = $request->title;
            $slider->priority = $request->priority;

            if (is_null($slider->status)) {
                $status = 0;
            }
            else {
                $status = 1;
            }
            $slider->status = $request->status;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                if ($image->isValid()){
                    $imageName = time().$image->getClientOriginalName();
                    $imagePath = 'uploads/frontend/image/slider/'. $imageName;
                    Image::make($image)->resize(1920, 510)->save($imagePath);
                }
                $slider->image = url($imagePath);
            }

            $success = $slider->save();
            if ($success) {
                $notification=array(
                'message' => 'Slider Added Successfully',
                'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        }

    	return view('backend.websettings.homepagesettings.slider.index', compact('sliders'));
    }

    public function destroy($id)
    {
        $sliderDelete = Slider::find($id);
        if (!is_null($sliderDelete)) {
            if (File::exists($sliderDelete->image)) {
                File::delete($sliderDelete->image);
            }

        $dlt = $sliderDelete->delete();
        if ($dlt) {
                $notification=array(
                    'message' => 'Slider Deleted Successfully',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        }
    }
}
