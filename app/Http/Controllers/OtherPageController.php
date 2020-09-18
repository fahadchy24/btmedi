<?php

namespace App\Http\Controllers;

use App\OtherPage;
use Illuminate\Http\Request;
use  Illuminate\Support\Str;

class OtherPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            // $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            $rules = [
                'meta_title' => 'unique:other_pages|required|string',
                'page_type' => 'required',
                'page_url' => 'unique:other_pages|required|string',
                'page_content' => 'required'
            ];
            $customMessages = [
                'meta_title.unique' => 'Meta Title has been used already.',
                'meta_title.required' => 'Meta Title is required.',
                'meta_title.string' => 'Meta Title must have a word.',
                'page_type.required' => 'Page Template is required.',
                'page_url.unique' => 'This Page Slug has been used already.',
                'page_url.string' => 'This Page Slug must have a word.',
                'page_content.required' => 'Page Content is required.',
            ];
            $this->validate($request, $rules, $customMessages);
    
            $otherPage = new OtherPage;
            $otherPage->meta_title = ucfirst($request->meta_title);
            $otherPage->meta_description = $request->meta_description;
            $otherPage->page_type = $request->page_type;
            $otherPage->page_url = Str::slug($request->page_url);
            $otherPage->page_content = $request->page_content;
            
            if (is_null($otherPage->status)) {
                $status = 0;
           }
           else {
                $status = 1;
           }
           $otherPage->status = $request->status;
    
            $success = $otherPage->save();
            if ($success) {
                $notification = array(
                    'message' => 'Page Added Successfully.',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        }
        $otherPage = OtherPage::all();
        return view('backend.websettings.generalsettings.other_page.index', compact('otherPage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OtherPage  $otherPage
     * @return \Illuminate\Http\Response
     */
    public function show(OtherPage $otherPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OtherPage  $otherPage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $editPage = OtherPage::find($id);
        return view('backend.websettings.generalsettings.other_page.edit', compact('editPage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OtherPage  $otherPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $otherPage = OtherPage::find($id);;
        $otherPage->meta_title = ucfirst($request->meta_title);
        $otherPage->meta_description = $request->meta_description;
        $otherPage->page_type = $request->page_type;
        $otherPage->page_url = Str::slug($request->page_url);
        $otherPage->page_content = $request->page_content;
        
        if (is_null($otherPage->status)) {
            $status = 0;
        }
        else {
            $status = 1;
        }
        $otherPage->status = $request->status;

        $success = $otherPage->save();
        if ($success) {
            $notification = array(
                'message' => 'Page Updated Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('other-page')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OtherPage  $otherPage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletePage = OtherPage::findOrFail($id);

        $delete = $deletePage->delete();
        if ($delete) {
            $notification = array(
                'message' => 'Page Deleted Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
}
