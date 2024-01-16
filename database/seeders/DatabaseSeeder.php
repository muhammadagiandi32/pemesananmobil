<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@gmail.com',
            'address'=>fake()->address(),
            'nohp'=>fake()->phoneNumber(13),
            'nosim'=>fake()->randomDigitNot(16),
            'role'=>'user'
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@gmail.com',
            'address'=>fake()->address(),
            'nohp'=>fake()->phoneNumber(13),
            'nosim'=>fake()->randomDigitNot(16),
            'role'=>'admin'
        ]);
        $faker = (new \Faker\Factory())::create();
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));
        for($i=1;$i<10;$i++){
            \App\Models\Cars::create([
                    'model' => $faker->vehicleModel,
                    'merek' => $faker->vehicle,
                    'nopol' => $faker->vehicleRegistration('[A-Z]{1} [0-9]{5} [A-Z]{3}'),
                    'gambar'=> fake()->imageUrl(),
                    'harga' => $faker->vehicleRegistration('[1-9]{5}'),
            ]);
        }
    }
}
