<?php

namespace Astros\Http\Controllers\Site;

use Astros\Http\Controllers\Controller;

class SiteController extends Controller
{
    /**
     * SiteController constructor.
     */
    public function __construct()
    {
        // No middleware here
    }

    public function index()
    {
        //return view('site.home');
    }
}