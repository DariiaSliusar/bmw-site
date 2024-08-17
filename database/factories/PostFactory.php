<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
//            'user_id' => User::factory(), // Assuming you have a User factory
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'short' => $this->faker->text(200),
            'content' => $this->faker->paragraphs(3, true),
        ];
    }
}