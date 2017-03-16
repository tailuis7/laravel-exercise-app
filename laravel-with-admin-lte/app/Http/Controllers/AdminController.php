<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class AdminController extends Controller
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
     * Show the Home Page.
     *
     * @return Response
     */
    public function index()
    {
        return view('layouts/blog/index');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function admin()
    {
        return view('adminlte::home');
    }
}