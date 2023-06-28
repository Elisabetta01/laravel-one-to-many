<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Admin\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'FrontEnd', 
            'Backend', 
            'FullStack', 
            'Design'
        ];

        foreach($categories as $element){
            $new_category = new Category();
            $new_category->name = $element;
            $new_category->save();
        }
    }
}
