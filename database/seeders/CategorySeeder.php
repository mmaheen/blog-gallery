<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Factory::create();

        $source_path = public_path('assets/frontend/assets/img/clients');
        $destination_path = public_path('uploads/categories');

        File::cleanDirectory($destination_path);
        File::copyDirectory($source_path,$destination_path);

        foreach(range(1,20) as $index){
            $photos = File::files($destination_path);
            $random_photo = $photos[array_rand($photos)];
            $photo_name = $random_photo->getFileName();

            $random_user_id = User::inRandomOrder()->first()->id;

            Category::create([
                'title' => $faker->realText($maxNbChars=10,$indexSize=2),
                'image' => $photo_name,
                'user_id' => $random_user_id,
                'created_at' =>$faker->dateTime()
            ]);
        }
    }
}
