<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HotelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        DB::table('hotels')->
        insert(
            [
                [
                    'name' => Str::random(10),
                    'username' => Str::random(10),
                    'email' => Str::random(10) . 'run@gmail.com',
                    'password' => bcrypt('password'),
                    'telephone' => (string)random_int(100000,999999)
                ],
                [
                    'name' => Str::random(10),
                    'username' => Str::random(10),
                    'email' => Str::random(10) . 'run@gmail.com',
                    'password' => bcrypt('password'),
                    'telephone' => (string)random_int(100000,999999)
                ],
                [
                    'name' => Str::random(10),
                    'username' => Str::random(10),
                    'email' => Str::random(10) . 'run@gmail.com',
                    'password' => bcrypt('password'),
                    'telephone' => (string)random_int(100000,999999)
                ],
                [
                    'name' => Str::random(10),
                    'username' => Str::random(10),
                    'email' => Str::random(10) . 'run@gmail.com',
                    'password' => bcrypt('password'),
                    'telephone' => (string)random_int(100000,999999)
                ],
                [
                    'name' => Str::random(10),
                    'username' => Str::random(10),
                    'email' => Str::random(10) . 'run@gmail.com',
                    'password' => bcrypt('password'),
                    'telephone' => (string)random_int(100000,999999)
                ],
                [
                    'name' => Str::random(10),
                    'username' => Str::random(10),
                    'email' => Str::random(10) . 'run@gmail.com',
                    'password' => bcrypt('password'),
                    'telephone' => (string)random_int(100000,999999)
                ],
                [
                    'name' => Str::random(10),
                    'username' => Str::random(10),
                    'email' => Str::random(10) . 'run@gmail.com',
                    'password' => bcrypt('password'),
                    'telephone' => (string)random_int(100000,999999)
                ],
                [
                    'name' => Str::random(10),
                    'username' => Str::random(10),
                    'email' => Str::random(10) . 'run@gmail.com',
                    'password' => bcrypt('password'),
                    'telephone' => (string)random_int(100000,999999)
                ],
                [
                    'name' => Str::random(10),
                    'username' => Str::random(10),
                    'email' => Str::random(10) . 'run@gmail.com',
                    'password' => bcrypt('password'),
                    'telephone' => (string)random_int(100000,999999)
                ],
                [
                    'name' => Str::random(10),
                    'username' => Str::random(10),
                    'email' => Str::random(10) . 'run@gmail.com',
                    'password' => bcrypt('password'),
                    'telephone' => (string)random_int(100000,999999)
                ],
            ]
        );
    }
}
