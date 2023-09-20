<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ShortLinkController extends Controller
{
    //

    public function index()
    {
        $shortLink = ShortUrl::latest()->get();
        return view('welcome', compact('shortLink'));
    }

    public function shorten(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'origin_url' => 'required|url'
        ]);

        if ($validator->fails()) {
            return redirect()->route('home')->withErrors($validator)->withInput();
        }

        $shortCode = Str::random(8);
        $customCode = "AABBCCDD";

        ShortUrl::create([
            'original_url' => $request->input('origin_url'),
            'short_code' => $shortCode,
            'custom_code' => $customCode,
        ]);

        return redirect()->route('home')->with('success', 'Short URL created successfully');
    }

    public function redirect($code)
    {
        // dd($code);
        $find = ShortUrl::where(function ($query) use ($code) {
            $query->where('short_code', $code)
                ->orWhere('custom_code', $code);
        })->latest()->first();
        
        if ($find) {
            return redirect($find->original_url);
        }
        
    }
    public function delete ($short_code){
                    
            ShortUrl::where('short_code', $short_code)->delete();
            return redirect()->route('admin.index')->with('success', 'Short URL delete successfully');
    }

}
