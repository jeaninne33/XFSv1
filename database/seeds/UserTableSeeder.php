<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run(){
           User::create(array(
               'username'  => 'admin',
               'email'     => 'admin@admin.com',
               'name'=> 'Administrator',
               'password' => Hash::make('admin') // Hash::make() nos va generar una cadena con nuestra contraseña encriptada
           ));
       }
}
