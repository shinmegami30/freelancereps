<?php

namespace App\Http\Controllers;

class PageController extends Controller
{

    /**
     * Display contacts page
     *
     * @return \Illuminate\View\View
     */
    public function contacts()
    {
        return view('pages.contact');
    }

}
