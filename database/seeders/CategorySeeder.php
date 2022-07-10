<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        Category::truncate();

        $categories =   [
            [
                'id' => 1,
                'description' => 'None Selected',
            ],
            [
                'id' => 2,
                'description' => 'Not Small Claims',
            ],
            [
                'id' => 3,
                'description' => 'General Procedure',
            ],
            [
                'id' => 4,
                'description' => 'Contracted Services',
            ],
            [
                'id' => 5,
                'description' => 'Merchandise and Goods',
            ],
            [
                'id' => 6,
                'description' => 'Personal Disputes',
            ],
            [
                'id' => 7,
                'description' => 'Collection from Judgements',
            ],
            [
                'id' => 8,
                'description' => 'Credit/Debit Disputes',
            ],
            [
                'id' => 9,
                'description' => 'Landlord/Tenant Law',
            ],
            [
                'id' => 10,
                'description' => 'Auto Law',
            ],
            [
                'id' => 11,
                'description' => 'Wage Law',
            ],
        ];

        Category::insert($categories);
    }
}