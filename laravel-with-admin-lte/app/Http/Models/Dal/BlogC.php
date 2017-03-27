<?php

namespace App\Http\Models\Dal;

use Illuminate\Support\Facades\DB;
use App\Http\Helpers\Constants;

class BlogC
{
	/**
     * insert blog
     * @param
     * @return
     */
    public static function insertBlog($blog_content) {
        return DB::table('blogs')->insert([$blog_content]);
    }
}
