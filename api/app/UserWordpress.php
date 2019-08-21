<?php
/**
 * Created by PhpStorm.
 * User: mariusz
 * Date: 17.06.19
 * Time: 11:41
 */

namespace App;
use Corcel\Model\User as Corcel;

class UserWordpress extends Corcel
{
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['meta', 'user_pass'];
}