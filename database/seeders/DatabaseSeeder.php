<?php
 namespace Database\Seeders;
 use App\Models\Article;
 use Illuminate\Database\Seeder;
 class DatabaseSeeder extends Seeder
 {
     public function run()
     {
         Article::factory()->times(50)->create();
     }
 } 