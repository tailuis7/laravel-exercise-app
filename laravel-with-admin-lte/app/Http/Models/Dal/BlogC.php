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
    public static function insertBlog($title, $body) {
        return DB::table('blogs')->insert([
		    [
		    	'user_id' => 1,
			    'title' => $title,
			    'body' => $body
		    ]
		]);
    }
}
