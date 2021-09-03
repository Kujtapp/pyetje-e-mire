<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'title' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
           'content' => $this->faker->realText($maxNbChars = 700, $indexSize = 2),
           'comment_id' => $this->faker->numberBetween(1,5),
           'user_id' => '1',
           'tag_id' => $this->faker->numberBetween(1,5),           
           'category_id'  => $this->faker->numberBetween(1,5),
        ];
    }
}


