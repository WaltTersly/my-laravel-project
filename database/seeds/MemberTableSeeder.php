<?php

use Illuminate\Database\Seeder;
use App\Member;

use Carbon\Carbon;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $now = Carbon::now();

        for ($i=0; $i <30 ; $i++) { 
            
            // $now = Carbon::now();

            $member = new Member();
            $member->first_name = 'victor';
            $member->surname = 'Mwangi';
            $member->idnumber = '2312342';
            $member->gender = 'male';
            $member->address = '34256,Nairobi';
            $member->telephone = '0722334455';
            $member->registration_day = '2020-07-16';
            $member->modeofpayment = 'cash';
            $member->membership_type = 'monthly';
            $member->created_at = $now->subDays($i);
            $member->save();

            $member = new Member();
            $member->first_name = 'vic';
            $member->surname = 'wangi';
            $member->idnumber = '2312389';
            $member->gender = 'female';
            $member->address = '34556,Nairobi';
            $member->telephone = '0722334495';
            $member->registration_day = '2020-07-21';
            $member->modeofpayment = 'Mpesa';
            $member->membership_type = 'weekly';
            $member->created_at = $now->subDays($i);
            $member->save();

            $member = new Member();
            $member->first_name = 'vicor';
            $member->surname = 'Mangi';
            $member->idnumber = '2312542';
            $member->gender = 'male';
            $member->address = '34286,Nairobi';
            $member->telephone = '0722337455';
            $member->registration_day = '2020-07-17';
            $member->modeofpayment = 'cash';
            $member->membership_type = 'daily';
            $member->created_at = $now->subDays($i);
            $member->save();
        //
        }
        //
    }
}
