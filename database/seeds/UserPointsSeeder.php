<?php

use Illuminate\Database\Seeder;

class UserPointsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        factory(\App\UserPoint::class, 500)->create();
    }
}
