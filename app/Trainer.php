<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'trainers';

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
    protected $fillable = ['First_name', 'surname', 'Gender', 'Address', 'Telephone'.'user_id'];

    public function trainergender()
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
        $trainer = new Trainer();
        $trainer->user_id = $user_id;
        $trainer->save();
        //creating one to one relationship with the user model
        return $this->belongsTo('App\User','trainers','id','user_id');
    }

}
