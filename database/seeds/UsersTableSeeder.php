<?php

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

            DB::table('users')->insert([
                'name'     => 'Sebastiaan',
                'email'    => 'sebas.nolte@hotmail.com',
                'password' => bcrypt('sebas'),

            ]);
        }

    }

