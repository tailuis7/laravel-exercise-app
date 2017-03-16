<?php

use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
    		[
    			'user_id' => 1,
    			'title' => 'Blog 1',
        		'body' => 'This is body 1'
        	],
            [
                'user_id' => 1,
                'title' => 'Blog 2',
                'body' => 'This is body 2'
            ]
        ]);
    }
}
