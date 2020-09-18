<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'members';

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
    protected $fillable = ['first_name', 'surname', 'idnumber', 'gender', 'address', 'telephone', 'registration_day', 'modeofpayment', 'membership_type'];

    public function membergender()
    {
        return [
            'male' => 'Male',
            'female' => 'Female',
            'other' => ' Other'
        ];
    }

    public function modepayment()
    {
        return [
            'cash' => 'Cash',
            'm-pesa' => 'M-pesa',
            'creditcard' => 'Creditcard'
        ];
    }

    public function membertype()
    {
        return [
            'daily' => 'Daily',
            'half_month' => 'Half_month',
            'monthly' => 'Monthly'
        ];
    }

    public function user()
    {
         $user_id = Auth::user()->id;
         $member = new Member();
         $member->user_id = $user_id;
         $member->save();
        //creating one to one relationship with the user model
        return $this->belongsTo('App\User', 'members', 'id', 'user_id');
    }
}
