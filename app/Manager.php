<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'managers';

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
    protected $fillable = ['First_name', 'surname', 'ID_No', 'Gender', 'Address', 'Telephone'];

    

    public function managergender()
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
        $manager = new Manager();
        $manager->user_id = $user_id;
        $manager->save();
        //creating one to one relationship with the user model
        return $this->belongsTo('App\User','managers','id','user_id');
    }
}
