<?php

use Illuminate\Database\Seeder;
use \App\Models\Blood;

class BloodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blood::create(['name' => 'o+','status' => '1']);
        Blood::create(['name' => 'o-','status' => '1']);
        Blood::create(['name' => 'a+','status' => '1']);
        Blood::create(['name' => 'a-','status' => '1']);
        Blood::create(['name' => 'b+','status' => '1']);
        Blood::create(['name' => 'b-','status' => '1']);
        Blood::create(['name' => 'ab+','status' => '1']);
        Blood::create(['name' => 'ab-','status' => '1']);
    }
}
