<?php

namespace Database\Seeders;

use App\Models\ProduitCategorie;
use Illuminate\Database\Seeder;

class ProduitCategorySeeder extends Seeder
{

    const CATEGORIES = ['Boisson', 'Biscuit', 'Repas préparé'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(self::CATEGORIES as $categoryName) {
            ProduitCategorie::query()->create([
                'name' => $categoryName
            ]);
        }
    }
}
