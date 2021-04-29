<?php

namespace Database\Seeders;

use App\Models\Article;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Article::count()) {
            $this->registerData();
        }
    }

    private function registerData()
    {
        $faker = Factory::create();

        foreach ([1, 2] as $userId) {
            foreach (range(1, random_int(1, 4)) as $i) {
                Article::create([
                    'user_id' => $userId,
                    'title' => 'article ' . $i . ' ' . $faker->title,
                    'body' => $faker->paragraph,
                ]);
            }
        }
    }
}
