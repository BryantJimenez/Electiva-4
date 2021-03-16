<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    
    $name=$faker->firstname;

	$count=User::where('name', $name)->count();
	$slug=Str::slug($name, '-');
	if ($count>0) {
		$slug=$slug."-".$count;
	}

    // Validación para que no se repita el slug
	$num=0;
	while (true) {
		$count2=User::where('slug', $slug)->count();
		if ($count2>0) {
			$slug=$slug."-".$num;
			$num++;
		} else {
			break;
		}
	}

    return [
		'name' => $name,
		'photo' => 'usuario.png',
		'slug' => $slug,
		'email' => $email,
		'state' => 1,
		'type' => 3
	];
});