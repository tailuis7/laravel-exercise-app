<?php

namespace App\Http\Models\Dal;

use App\Http\Helpers\Constants;
use Illuminate\Database\Eloquent\Model;

class UserGroupsQ extends Model
{
	/**
     * Get the User that owns the Role.
     */
    // public function getUser()
    // {
    //     return $this->belongsToMany('App\Http\Models\Business\User', 'user_groups', 'group_id', 'user_id');
    // }
}