<?php

use Illuminate\Database\Seeder;
use App\User;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create();
    }
}
