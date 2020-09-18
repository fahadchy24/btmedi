<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controller\Controllers;

class CookiesController extends Controller
{
    public function setCookie(Request $request)
    {
        $minutes = 10;
        $response = new Response('Hello World');
        $response->withCookie(cookie('name', 'Okay', $minutes));
        return $response;
    }

    public function getCookie(Request $request)
    {
        $value = $request->cookie('name');
        echo $value;
    }
}
