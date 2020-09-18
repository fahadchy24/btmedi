<?php

namespace App\Http\Controllers;

use App\Sociallink;
use Illuminate\Http\Request;

class SocialSettingController extends Controller
{
    public function socialLinks(Request $request)
    {
        $socialdata = Sociallink::findOrFail(1);

        if ($request->isMethod('post')) {
            
            $input = $request->all();

            if ($request->f_status == ""){
            $input['f_status'] = 0;
            }
            if ($request->i_status == ""){
            $input['i_status'] = 0;
            }

            if ($request->t_status == ""){
            $input['t_status'] = 0;
            }

            if ($request->p_status == ""){
            $input['p_status'] = 0;
            }
            
            $success = $socialdata->update($input);
            if ($success) {
                $notification=array(
                'message' => 'Social Links Updated Successfully ',
                'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        }
        
        return view('backend.websettings.generalsettings.website_footer.socialsetting', compact('socialdata'));
    }
}
