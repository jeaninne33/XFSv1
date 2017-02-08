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
        'codigop'  => $faker->name,
        'telefono'  => $faker->name,
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
        'direccionBanco'  => $faker->name,
        'titulo'  =>  $faker->name,
        'tipo'  =>'client',
        'cargo'  => $faker->name,
        'categoria'  => $faker->name,
        'servicio_disp'  => $faker->name,
        'estado_id'  =>'1',
        'pais_id'  => '1',
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
        'codigop'  => $faker->name,
        'telefono'  => $faker->name,
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
        'direccionBanco'  => $faker->name,
        'titulo'  => $faker->name,
        'tipo'  => null,
        'cargo'  => $faker->name,
        'categoria'  => $faker->name,
        'servicio_disp'  => $faker->name,
        'estado_id'  => '1',
        'pais_id'  => '1',
    ];
});
