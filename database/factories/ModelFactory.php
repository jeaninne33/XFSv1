<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(XFS\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->defineAs(XFS\Company::class, 'proveedor', function ($faker) {
    return [
      $table->increments('id');
      $table->string('nombre',100)->unique();
      $table->string('correo',100)->unique();
      $table->string('direccion', 500);
      $table->string('website', 50);
      $table->string('representante', 100);
      $table->string('ciudad', 50);
      $table->string('pais', 50);
      $table->string('codigop', 50);
      $table->string('telefono', 50);
      $table->timestamps();
        'nombre'  => $faker->sentence(),
        'correo'   => $faker->email,
        'direccion'  =>$faker->text,
        'website'  => $faker->sentence(),
        'representante'  => $faker->sentence(),
        'ciudad'  => $faker->sentence(),
        'pais'  => $faker->sentence(),
        'codigop'  => $faker->sentence(),
        'telefono'  => $faker->sentence(),
    ];
});
$factory->defineAs(XFS\Company::class, 'cliente', function ($faker) {
    return [
        'title'  => $faker->sentence(),
        'body'   => $faker->text,
        'active' => false,
    ];
});
