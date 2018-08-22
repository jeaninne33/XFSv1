<?php

use Illuminate\Database\Seeder;
use XFS\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run(){
           User::create(array(
               'type'  => 'admin',
               'email'     => 'admin@admin.com',
               'name'=> 'Administrator',
               'password' => Hash::make('admin') // Hash::make() nos va generar una cadena con nuestra contraseña encriptada
           ));
       }
}
