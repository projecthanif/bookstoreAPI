<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Genre;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement(['ongoing', 'finished', 'hietus', 'dropped']);
        $tags = Tag::all()->random(4)->toJson();
        $genres = Genre::all()->random(2)->toJson();

        return [
            'title' => $this->faker->colorName(),
            'status' => $status,
            'year_of_publishing' => $this->faker->dateTimeThisDecade(),
            'author_id' => Author::factory(),
            'tags' => $tags,
            'genres' => $genres,
            'description' => $this->faker->paragraph()
        ];
    }
}
