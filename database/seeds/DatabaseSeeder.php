<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();


      factory('XFS\Company','proveedor', 30)->create();
      factory('XFS\Company','cliente',20)->create();
       // $this->call('UserTableSeeder');


        Model::reguard();
    }
}
