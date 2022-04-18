<?php
namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->catchPhrase();
        $paragraphs = $this->faker->paragraphs(rand(2, 20));
        $post = "<h1>{$title}</h1>";
        foreach ($paragraphs as $para) {
            $post .= "<p>{$para}</p><br>";
        }

        return [
            'title' => $this->faker->catchPhrase(),
            'content' => $post,
            'active' => $this->faker->boolean(),
            'user_id' => User::inRandomOrder()->value('id'),
            'category_id' => Category::inRandomOrder()->value('id'),
            'published_at' => $this->faker->dateTimeBetween(now()->subYear(), now()),
            'image_path' => 'https://source.unsplash.com/random',
            'summary' => $this->faker->realTextBetween(20, 200)
        ];
    }
}