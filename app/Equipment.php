<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'equipments';

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
    protected $fillable = ['Equipmentname', 'State_of_equipment', 'Equipment_location', 'Date_servicing', 'Date_replacing', 'number_in_store', 'Price', 'Type'];

    public function equipmentstate()
    {
        return [
            'usable' => 'Usable',
            'semi-functional' => 'Semi-functional',
            'out_of_order' => ' Out_of_order'
        
        ];
    }

    public function equipmentlocation()
    {
        return [
            'gym' => 'Gym',
            'store' => 'Store',
            'inrepair' => 'Inrepair'

        ];
    }

    public function equipmenttype()
    {
        return [
            'dumbell'=> 'Dumbell', 
            'barbel'=>'Barbel', 
            'roller'=>'Roller',
            'bench'=>'Bench',
            'preacher bench' => 'Preacher bench',
            'cables' => 'Cables',
            'smith machine' => 'Smith machine',
            'hack squat machine' => 'Hack squat machine',
            'indoor cycle' => 'Indoor cycle',
            'kettle bell' => 'Kettle bells',
            'stability ball' => 'Stability ball',
            'wall ball' => 'Wall ball',
        ];
    }
    
}
