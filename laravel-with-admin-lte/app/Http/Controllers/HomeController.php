<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Models\Dal\BlogQ;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $checkLogin = FALSE;
        if (Auth::check()) {
            // The user is logged in...
            $checkLogin = TRUE;
            // echo "OK"; exit();

        }
        //Get Blogs
        $blogs = BlogQ::getBlogs();
        // dd($blogs);
        return view('layouts/blog/index', compact('checkLogin', 'blogs'));
    }
}