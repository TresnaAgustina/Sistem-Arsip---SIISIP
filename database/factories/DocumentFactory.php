<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Seeders\DocumentSeeder;

class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
        return [
            'no_surat' => "Kominfo/".$faker->randomNumber(3, true)."/".$faker->date('m-y', '1-2020', '2-2023'),
            'tanggal' => $faker->dateTimeBetween('-1 year', '+1 month'),
            'kategori' => $faker->randomElement(['spj', 'kontrak', 'produk hukum']),
            'judul' => $faker->sentence(4),
            'link_file' => "https://drive.google.com/file/d/18gBE3KFsbBV2nGGP80-322JS9UdfchDl/view?usp=share_link",
            'uraian' => $faker->sentence(3),
        ];
    }
}
