<?php

use Illuminate\Database\Seeder;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->truncate();

        $member = new \VMN\Auth\Member();
        $member->accountName    = 'Rikky';
        $member->email          = 'sonvl@vnvalley.com';
        $member->gender         = 'Nam';
        $member->firstName      = 'Son';
        $member->lastName       = 'Le';
        $member->DoB            = '25/12/1990';

        $member->save();


        $member1 = new \VMN\Auth\Member();
        $member1->accountName    = 'TienNM';
        $member1->email          = 'tiennmse02545@fpt.edu.vn';
        $member1->gender         = 'Nam';
        $member1->firstName      = 'Tien';
        $member1->lastName       = 'Nguyen';
        $member1->DoB            = '31/12/1992';

        $member1->save();

        $member2 = new \VMN\Auth\Member();
        $member2->accountName    = 'shinji';
        $member2->email          = 'waynerooney_hotboysanco@yahoo.com';
        $member2->gender         = 'Nam';
        $member2->firstName      = 'Shinji';
        $member2->lastName       = 'Kagawa';
        $member2->DoB            = '11/10/1989';

        $member2->save();
    }
}
