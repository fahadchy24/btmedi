<?php

namespace App\Http\Controllers;

use App\CallLog;
use App\User;
use Illuminate\Http\Request;

class CallLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $callLog = CallLog::all();

        return view('backend.call_log.index', compact('callLog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customerInfo = User::all();
        return view('backend.call_log.create', compact('customerInfo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data = $request->all();

       $data['created_by'] = "1";

       $success = CallLog::create($data);

       if ($success) {
        $notification=array(
        'message' => 'Call Log Added Successfully ',
        'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CallLog  $callLog
     * @return \Illuminate\Http\Response
     */
    public function show(CallLog $callLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CallLog  $callLog
     * @return \Illuminate\Http\Response
     */
    public function edit(CallLog $callLog, $id)
    {
        $editCallLog = CallLog::findOrFail($id);

        return view('backend.call_log.edit', compact('editCallLog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CallLog  $callLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $success = CallLog::find($id)->update($request->all());

        if ($success) {
            $notification=array(
                'message' => 'Call Log Updated Successfully ',
                'alert-type' => 'success'
            );
            return redirect()->route('call-log')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CallLog  $callLog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dltCallLog = CallLog::findOrFail($id)->delete();

        if ($dltCallLog) {
            $notification=array(
            'message' => 'Call Log Deleted Successfully ',
            'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function userAutocomplete()
    {
        return User::all();
    }
}
