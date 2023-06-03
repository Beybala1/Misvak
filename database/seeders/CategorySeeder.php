<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoryTranslation;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 5) as $key => $index) {
            $category = new Category();
            $category->save();
            foreach (active_langs() as $lang) {
                $langCode = $lang->code; 
                
                CategoryTranslation::create([
                    'title' => 'Category_' . $langCode,
                    'locale' => $langCode,
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}
