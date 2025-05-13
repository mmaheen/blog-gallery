<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Factory::create();
        
        $source_path = public_path('assets/frontend/assets/img/person');
        $destination_path = public_path('uploads/users');

        File::cleanDirectory($destination_path);
        File::copyDirectory($source_path,$destination_path);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '0',
            'image' => 'person-f-8.webp'
        ]);

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => '0',
            'image' => 'person-m-7.webp'
        ]);

        foreach(range(1,20) as $index){
            $photos = File::files($destination_path);
            $random_photo = $photos[array_rand($photos)];
            $photo_name = $random_photo->getFileName(); 
            
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $faker->password,
                'image' => $photo_name,
            ]);
        }
    }
}
