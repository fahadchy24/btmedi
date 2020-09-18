<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_menu = Menu::all();
        return view('backend.websettings.allmenu.menu.index', compact('all_menu'));
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
        $rules = [
            'name' => 'unique:menus|string',
            'url' => 'unique:menus|string',
        ];
        $customMessages = [
            'name.unique' => 'This Category Name has been used already.',
            'name.string' => 'This Category Name must have a word.',
            'url.unique' => 'This Category URL has been used already.',
            'url.string' => 'This Category URL must have a word.',
        ];
        $this->validate($request, $rules, $customMessages);

        $menu = new Menu;
        $menu->name = strtoupper($request->name);
        $menu->url = strtolower($request->url);

        $success = $menu->save();
        if ($success) {
            $notification = array(
                'message' => 'Menu Added Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menuDetails = Menu::findOrFail($id);

        return view('backend.websettings.allmenu.menu.edit', compact('menuDetails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updatemenu = Menu::findOrFail($id);
        $updatemenu->name = strtoupper($request->name);
        $updatemenu->url = strtolower($request->url);

        $success = $updatemenu->save();
        if ($success) {
            $notification = array(
                'message' => 'Menu Updated Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('menu.index')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menuDelete = Menu::find($id);

        $dlt = $menuDelete->delete();
        if ($dlt) {
                $notification=array(
                    'message' => 'Menu Deleted Successfully',
                    'alert-type' => 'success'
                );
                
            return redirect()->back()->with($notification);
        }
    }
}

  