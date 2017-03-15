<?php

namespace App\Http\Models\Bussiness;

// use App\Http\Helpers\Constants;

class Groups
{
    // protected $table = Constants::GROUPS;
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'name',
    ];
}