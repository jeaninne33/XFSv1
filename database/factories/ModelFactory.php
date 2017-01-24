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
        'nombre'  => $faker->name,
        'correo'   => $faker->email,
        'direccion'  =>$faker->sentence(),
        'website'  => $faker->name,
        'representante'  => $faker->sentence(),
        'ciudad'  => $faker->name,
        'pais'  => $faker->name,
        'codigop'  => $faker->name,
        'telefono'  => $faker->name,
        'estado'  => $faker->name,
        'relacion'   => 'Proveedor',
        'tipo_prove'  =>'FBO/Handler',
        'certificacion'  => $faker->sentence(),
        'contacto_admin'  => $faker->sentence(),
        'celular'  => $faker->name,
        'correo_admin'  => $faker->email,
        'telefono_admin'  => $faker->name,
        'banco'  => $faker->name,
        'cuenta'  => $faker->name,
        'direccion_cuenta'  => $faker->name,
        'aba'  => $faker->name,
    ];
});
$factory->defineAs(XFS\Company::class, 'cliente', function ($faker) {
    return [
        'nombre'  => $faker->name,
        'correo'   => $faker->email,
        'direccion'  =>$faker->sentence(),
        'website'  => $faker->name,
        'representante'  => $faker->sentence(),
        'ciudad'  => $faker->name,
        'pais'  => $faker->name,
        'codigop'  => $faker->name,
        'telefono'  => $faker->name,
        'estado'  => $faker->name,
        'relacion'   => 'Cliente',
        'tipo_prove'  =>null,
        'certificacion'  => $faker->sentence(),
        'contacto_admin'  => $faker->sentence(),
        'celular'  => $faker->name,
        'correo_admin'  => $faker->email,
        'telefono_admin'  => $faker->name,
        'banco'  => $faker->name,
        'cuenta'  => $faker->name,
        'direccion_cuenta'  => $faker->name,
        'aba'  => $faker->name,
    ];
});
