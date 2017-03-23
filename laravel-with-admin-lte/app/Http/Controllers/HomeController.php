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
use App\Http\Models\Business\User;
use Illuminate\Support\Facades\View;


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
        $this->middleware(function ($request, $next) {
            if (Auth::check()) {
                // The user is logged in...
                $checkLogin = TRUE;
                // echo "OK"; exit();
                View::share('checkLogin', $checkLogin);
                //Check if user is admin or not
                if (User::checkAdmin(Auth::user()->id)) {
                    $checkAdmin = TRUE;
                    View::share('checkAdmin', $checkAdmin);
                }
            }
            return $next($request);
        });
        
        
        
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        //Get Blogs
        $blogs = BlogQ::getBlogs();
        // dd($blogs);
        return view('layouts/blog/index', compact('blogs'));
    }

    /**
     * Show blog detail page.
     *
     * @return Response
     */
    public function showBlogDetail()
    {
        return view('layouts/blog/blog_detail');
    }
}