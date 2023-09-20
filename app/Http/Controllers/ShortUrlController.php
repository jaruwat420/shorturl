<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ShortUrlController extends Controller
{
    //
    public function shorten(Request $request)
    {
        
            if ($request->ajax()) {
                //dd($request->all());
                $request->validate([
                    'original_url' => 'required|url',
                ]);
                $shortCode = Str::random(6);
                $customCode  = 'HELLO';

                ShortUrl::create([
                    'original_url' => $request->input('original_url'),
                    'short_code' => $shortCode,
                    'custom_code' => $customCode,
                ]);
                // Get Data
                $query = ShortUrl::latest()->first();

                if ($query){
                    $originalUrl = $query->original_url;
                    $shortCode = $query->short_code;
                    $customCode = $query->custom_code;
                }

                return response()->json([
                    'message' => 'Short URL created successfully',
                    'original_url' => $originalUrl,
                    'short_code' => $shortCode,
                    'custom_code' => $customCode,                    
                ], 200);
            }
        
    }

    public function show(Request $request)
    {
        return view('home');
        
    }
}
