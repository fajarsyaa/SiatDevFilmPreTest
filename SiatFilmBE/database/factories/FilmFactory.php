<?php

namespace Database\Factories;

use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gmbr = $this->faker->numberBetween(1, 6);
        return [
            'judul' => $this->faker->sentence,
            'sinopsis' => $this->faker->text(300),
            'publisher' => $this->faker->company,
            'durasi' => $this->faker->numberBetween(80, 180),
            'id_kategori' => $this->faker->numberBetween(1, 20),
            'path_video' => 'video/'.$gmbr.'.mp4',
            'path_thumbnail' => 'thumbnail/'.$gmbr.$this->faker->numberBetween(1, 4).'.jpg',
            'tahun_rilis' => $this->faker->year,
        ];
    }

    /**
     * Indicate that the film should have a detail film.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withDetailFilm()
    {
        return $this->afterCreating(function (Film $film) {
            $film->detailFilm()->create([                 
                'aktor' => $this->faker->name.','.$this->faker->name.','.$this->faker->name.','.$this->faker->name.','.$this->faker->name.','.$this->faker->name,
                'sutradara' => $this->faker->name,
                'rating' => $this->faker->randomFloat(1, 1, 10),                
            ]);
        });
    }
}
