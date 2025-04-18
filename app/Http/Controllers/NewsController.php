<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblNews;
class NewsController extends Controller
{
    //
    public function index () {
        $listofnews = TblNews::where('IsActive',1)->get();
        return view('pages.news',compact('listofnews'));
    }

    public function Details($id) {
        $newsdetails = TblNews::where('NewsID', $id)->firstOrFail ();
        return view('pages.newsdetails', compact('newsdetails'));
    }
}
