<?php

namespace App\Http\Models\Dal;

use Illuminate\Support\Facades\DB;
use App\Http\Helpers\Constants;

class UserQ
{
	/**
     * Get Roles belong to User.
     */
	// public function getRoles () {
	//     return $this->belongsToMany('App\Http\Models\Business\Groups');
	// }

	/**
     * get role user by id
     * @param id
     * @return array role user
     */
    public static function getRolesUser($id) {
        return DB::table('users_groups' . ' as ug')
                ->select('name')
                ->join('groups' . ' as g', 'g.id', '=', 'ug.group_id')
                ->where('ug.user_id', '=', $id)
                ->get();
    }
}