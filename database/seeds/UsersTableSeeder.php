<?php

use Carbon\Carbon;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('abcabc'),
                'status' => true,
                'is_admin' => true,
                'confirm_code' => str_random(64),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 10,
                'name' => 'Guest',
                'email' => 'guest@clashofnerds.com',
                'password' => hash::make('UX7UcNYcMuMZfBuO'),
                'status' => true,
                'is_admin' => true,
                'confirm_code' => str_random(64),
                'created_at' => carbon::now(),
                'updated_at' => carbon::now()
            ]
        ];

        DB::table('users')->insert($users);

//        factory(User::class, 10)->create();
    }
}
