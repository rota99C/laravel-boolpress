<?php

use Illuminate\Database\Seeder;
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
        $categories = ['salute', 'sport', 'gossip'];
        foreach ($categories as $category) {
            $_cat = new Category();
            $_cat->name = $category;
            $_cat->save();
        }
    }
}
