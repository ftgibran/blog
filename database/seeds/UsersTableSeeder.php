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
                'name' => 'Felipe Gibran',
                'email' => 'ft.gibran@gmail.com',
                'password' => Hash::make('abcabc'),
                'status' => true,
                'is_admin' => true,
                'confirm_code' => str_random(64),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Vinicius França',
                'email' => 'viniciusdasilva10@hotmail.com',
                'password' => Hash::make('abcabc'),
                'status' => true,
                'is_admin' => true,
                'confirm_code' => str_random(64),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Allan Fernandes',
                'email' => 'allanutrition@gmail.com',
                'password' => Hash::make('abcabc'),
                'status' => true,
                'is_admin' => true,
                'confirm_code' => str_random(64),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Ana Parrotto',
                'email' => 'ana.parrotto@gmail.com',
                'password' => Hash::make('abcabc'),
                'status' => true,
                'is_admin' => true,
                'confirm_code' => str_random(64),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Bruna D\'Amato',
                'email' => 'brunadamato@outlook.com',
                'password' => Hash::make('abcabc'),
                'status' => true,
                'is_admin' => true,
                'confirm_code' => str_random(64),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Gabriel Farias',
                'email' => 'gabrielgsf31@gmail.com',
                'password' => Hash::make('abcabc'),
                'status' => true,
                'is_admin' => true,
                'confirm_code' => str_random(64),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'João Victor Fagundes',
                'email' => 'joaostorel@gmail.com',
                'password' => Hash::make('abcabc'),
                'status' => true,
                'is_admin' => true,
                'confirm_code' => str_random(64),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Julia Wajs',
                'email' => 'juliaswajs@gmail.com',
                'password' => hash::make('abcabc'),
                'status' => true,
                'is_admin' => true,
                'confirm_code' => str_random(64),
                'created_at' => carbon::now(),
                'updated_at' => carbon::now()
            ],
            [
                'name' => 'Bruno Shigueo',
                'email' => 'yesshigueo@gmail.com',
                'password' => hash::make('abcabc123123'),
                'status' => true,
                'is_admin' => true,
                'confirm_code' => str_random(64),
                'created_at' => carbon::now(),
                'updated_at' => carbon::now()
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
