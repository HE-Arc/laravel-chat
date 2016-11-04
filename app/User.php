<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @SWG\Definition(
 *  required={"id", "name", "email"}
 * )
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * @SWG\Property(
     *  property="id",
     *  type="integer",
     *  format="int64"
     * )
     *
     * @SWG\Property(
     *  property="name",
     *  type="string"
     * )
     *
     * @SWG\Property(
     *  property="email",
     *  type="string"
     * )
     */

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
}
