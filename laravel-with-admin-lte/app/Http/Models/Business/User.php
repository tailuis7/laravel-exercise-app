<?php

namespace App\Http\Models\Business;

use Illuminate\Foundation\Auth\User as Authenticatable;
// use App\Http\Helpers\Constants;
use App\Http\Helpers\Constants;
use App\Http\Models\Dal\UserQ;

class User extends Authenticatable
{
    // protected $table = Constants::USERS;
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * check user is admin by is
     * @param id
     * @return boolean
     */
    public static function checkAdmin($id) {
        $roles = UserQ::getRolesUser($id);
        foreach ($roles as $role) {
            if ($role->name == 'admin') {
                return TRUE;
            }
        }
        return FALSE;
    }
}