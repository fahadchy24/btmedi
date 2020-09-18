<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
    	$subscribers = Subscriber::all();
    	return view('backend.subscriber.index', compact('subscribers'));
    }
}
