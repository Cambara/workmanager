<?php

use Illuminate\Database\Seeder;

class WorkTableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\WorkTable::class,30)->create();
    }
}
