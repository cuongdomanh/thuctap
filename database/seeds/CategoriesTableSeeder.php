<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Helpers\Helper;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [ 'title' => 'Bollywood', 'description' => 'Bollywood Type'],
            [ 'title' => 'Message', 'description' => 'Message Type'],
            [ 'title' => 'Country', 'description' => 'Country Type'],
            [ 'title' => 'Rap & Hip Hop', 'description' => 'Rap & Hip Hop Type'],
            [ 'title' => 'Rock', 'description' => 'Rock Type'],
            [ 'title' => 'Funny Ringtones', 'description' => 'Funny Ringtones Type'],
            [ 'title' => 'Guitar', 'description' => 'Guitar Type'],
            [ 'title' => 'Classical', 'description' => 'Classical Type'],
            [ 'title' => 'Games', 'description' => 'Games Type'],
            [ 'title' => 'Holiday', 'description' => 'Holiday Type'],
            [ 'title' => 'Dance, Remix, DJ', 'description' => 'Dance, Remix, DJ Type'],
            [ 'title' => 'Blues and Jazz', 'description' => 'Blues and Jazz Type'],
            [ 'title' => 'Sound Effects', 'description' => 'Sound Effects Type'],
            [ 'title' => 'Latin', 'description' => 'Latin Type'],
            [ 'title' => 'Pets and Animals', 'description' => 'Pets and Animals Type'],
            [ 'title' => 'Reggae', 'description' => 'Reggae Type'],
            [ 'title' => 'Pop', 'description' => 'Pop Type'],
            [ 'title' => 'Baby', 'description' => 'Baby Type'],
            [ 'title' => 'R & B / Soul', 'description' => 'R & B / Soul Type'],
            [ 'title' => 'My Name', 'description' => 'My Name Type'],
            [ 'title' => 'Korea Ringtones', 'description' => 'Korea Ringtones Type'],
            [ 'title' => 'Scary Horror', 'description' => 'Scary Horror Type'],
            [ 'title' => 'Intrumental', 'description' => 'Intrumental Type'],
            [ 'title' => 'Iphone Ringtones', 'description' => 'Iphone Ringtones Type'],
            [ 'title' => 'Samsung Ringtones', 'description' => 'Samsung Ringtones Type'],
            [ 'title' => 'Loud Ringtones', 'description' => 'Loud Ringtones Type']
        ];

        foreach ($categories as $category) {
            $slug = Helper::slug($category['title']);
            if (Category::where('slug', $slug)->count() <= 0) {
                $category['slug'] = $slug;
                Category::create($category);
            }
        }
    }
}
