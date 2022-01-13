<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Prospect;
use Faker\Generator as Faker;
use App\User;

$factory->define(Prospect::class, function (Faker $faker) {
    return [
        'civilite' => $faker->randomElement(['Mr','Mme']),
        'SIREN' => $faker->numerify('##########'),
        'mail' => $faker->email,
        'tel' => $faker->phoneNumber,
        'raison_sociale' => $faker->company,
        'professions' => $faker->sentence,
        'prenom' => $faker->firstName,
        'nom' => $faker->lastName,
        'role' => $faker->jobTitle,
        'adresse' => $faker->address,
        'code_postal' => $faker->postcode,
        'ville' => $faker->city,
        'fixe' => $faker->phoneNumber,
        'annee_de_creation' => $faker->sentence,
        'form_legale' => $faker->domainWord,
        'user_id' => User::all()->random()->id
    ];
});
