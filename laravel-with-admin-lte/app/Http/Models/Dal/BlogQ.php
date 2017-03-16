<?php

namespace App\Http\Models\Dal;

use Illuminate\Support\Facades\DB;
use App\Http\Helpers\Constants;

class BlogQ
{
	/**
     * get blogs
     * @param 
     * @return array blogs
     */
    public static function getBlogs() {
        return DB::table(Constants::BLOGS . ' as b')
        		->join(Constants::USERS . ' as u', 'b.user_id', '=', 'u.id')
                ->select('u.name', 'b.title', 'b.body')
                ->get();
    }
}