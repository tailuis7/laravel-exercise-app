<?php

namespace App\Http\Models\Bussiness;

// use App\Http\Helpers\Constants;

class UserGroups
{
	// protected $table = Constants::USER_GROUPS;
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'group_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id', 'group_id',
    ];
}