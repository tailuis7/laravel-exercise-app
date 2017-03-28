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
use App\Http\Models\Dal\BlogC;
use App\Http\Models\Business\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;


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

    /**
     * Show the form to create a new blog post.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts/blog/create_blog_form');
    }

    /**
     * Store a new blog post.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // Validate and store the blog post...
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required',
        ]);


        // The blog post is valid, store in database...

        //Get request data
        $request_data = $_POST;

        //Create needed array to store to DB
        $blog_content = [
            'user_id' => 1,
            'title' => $request_data['title'],
            'body' => $request_data['body']
        ];
        // dd($request_data);
        // dd($blog_content);
        $blog = new BlogC;
        // $title = Input::get('title');
        // $body = Input::get('body');
        // $blog_content = Input::all();
        
        if ($blog->insertBlog($blog_content)) {$request->session()->flash('alert-success', 'User was successful added!');
            $request->session()->flash('alert-success', 'Blog was successful created!');
            return redirect('home');
        } else {
            $request->session()->flash('alert-danger', 'Blog was unsuccessful created!');
        }
    }
}