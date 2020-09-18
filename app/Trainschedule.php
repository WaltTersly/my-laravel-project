<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainschedule extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'trainschedules';

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
    protected $fillable = ['First_name', 'surname', 'Daysactive', 'Time_in', 'Time_out', 'Day1', 'Day2', 'Day3', 'Day4', 'Daysoffweekly', 'Day_off_1', 'Day_off_2', 'Day_off_3'];

    
}
