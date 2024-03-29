<?php
 namespace Database\Factories;
 use App\Models\Article;
 use Illuminate\Database\Eloquent\Factories\Factory;
 class ArticleFactory extends Factory
 {
     protected $model = Article::class;
     public function definition()
     {
         return [
             'title' => $this->faker->sentence(),
             'body' => $this->faker->text(),
             'tags' => collect(['php', 'ruby', 'java', 'javascript', 'bash'])
                 ->random(2)
                 ->values()
                 ->all(),
         ];
     }
 } 