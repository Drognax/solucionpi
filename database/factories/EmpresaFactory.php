<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\empresa;
use Faker\Generator as Faker;

$factory->define(empresa::class, function (Faker $faker) {
    return [
        'nombre'=>$faker->name,
        'rut'=>$faker->unique(true)->randomDigit,
        'giro'=>$faker->randomDigit,
        'representante'=>$faker->name,
        'contacto'=>$faker->randomDigit,
        'direccion'=>$faker->address,
        'certificado'=>$faker->sentence(3,false),
        'cotizacion'=> $faker->text,
        'trabajadores'=>$faker->text,
         'contrato'=>$faker->text,
    ];
});
