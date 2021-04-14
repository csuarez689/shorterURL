<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUrlRequest;
use App\Models\Url;
use Illuminate\Http\Request;


class UrlController extends Controller
{

    public function show(Request $request,Url $url){
        return redirect()->away($url->url);
    }

    public function store(StoreUrlRequest $request){
        $url= Url::create($request->long_url);
        return response()->json([
            'short_url'=>url('/') . '/' . $url->code
        ]);
    }
}
