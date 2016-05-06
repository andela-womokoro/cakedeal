<?php

namespace CakeDeal;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'username', 'email', 'password', 'phone_no', 'first_name', 'last_name', 'sex', 'avatar_url', 'provider',
        'uid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders()
    {
        return $this->hasMany('CakeDeal\Order');
    }

    public function products()
    {
        return $this->hasMany('CakeDeal\Product');
    }

    /**
     * Get the avatar from gravatar.
     *
     * @return string
     */
    private function getAvatarFromGravatar()
    {
        return 'http://www.gravatar.com/avatar/'.md5(strtolower(trim($this->email))).'?d=mm&s=500';
    }

    /**
     * Get avatar from the model.
     *
     * @return string
     */
    public function getAvatar()
    {
        return (! is_null($this->avatar_url)) ? $this->avatar_url : $this->getAvatarFromGravatar();
    }
}
