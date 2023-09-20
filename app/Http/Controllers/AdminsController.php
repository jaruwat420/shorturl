<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;

class AdminsController extends Controller
{

    //
    public function index()
    {
        $query = ShortUrl::all();
        return view('admin.index',compact('query'));
    }
}
