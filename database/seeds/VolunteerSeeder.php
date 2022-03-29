<?php

use Illuminate\Database\Seeder;
use App\User;
class VolunteerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'role'=>3,

        ]);
    }
}
