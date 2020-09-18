<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cashier extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cashiers';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['First_name', 'surname', 'username', 'Gender', 'Address', 'Telephone'];

    public function cashiergender()
    {
        return [
            'male' => 'Male',
            'female' => 'Female',
            'other' => ' Other'
        ];
    }

    public function user()
    {
        $user_id = Auth::user()->id;
        $cashier = new Cashier();
        $cashier->user_id = $user_id;
        $cashier->save();
        //creating one to one relationship with the user model
        return $this->belongsTo('App\User', 'cashiers', 'id', 'user_id');
    }
    
}
