<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Role extends Model
{
    //
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rname', 'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $primarykey = 'id';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $table = "roles";

    public function users()
    {
        //a user could have more than one role
        return $this->belongsToMany('App\User', 'user_role', 'role_id', 'user_id');
    }
             
}
