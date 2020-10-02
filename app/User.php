<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','lname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'lname', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        // many roles could be assigned to a user
        return $this->belongsToMany('App\Role', 'user_role', 'user_id', 'role_id');
    }
    //checks if a users has been assigned a role
    public function hasanyrole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
            //checks for individual role assignment
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role)
    {

        if ($this->roles()->where('rname', $role)->first()) {

            return true;
        }
        return false;
    }

    public function trainer()
    {
        //one to one relationship with the trainer model
        return $this->hasOne('App\Trainer');
    }

    public function member()
    {

        return $this->hasOne('App\Member');
    }

    public function cashier()
    {

        return $this->hasOne('App\Cashier');
    }

}
