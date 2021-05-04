<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    /**
     * Display static page
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function display($slug){
        return view()->exists('pages.static.' . $slug) ? view('pages.static.' . $slug) : abort(404);
    }
    
}
