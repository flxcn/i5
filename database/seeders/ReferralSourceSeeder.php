<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ReferralSource;

class ReferralSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $referral_sources =   [
            [
                'id' => 1,
                'description' => 'None Selected',
            ],
            [
                'id' => 2,
                'description' => 'Other',
            ],
            [
                'id' => 3,
                'description' => 'Flier/Brochure',
            ],
            [
                'id' => 4,
                'description' => 'Friend/Family',
            ],
            [
                'id' => 5,
                'description' => 'Attorney General',
            ],
            [
                'id' => 6,
                'description' => 'Greater Boston Legal Services',
            ],
            [
                'id' => 7,
                'description' => 'Search Engine',
            ],
            [
                'id' => 8,
                'description' => 'MBTA Ad',
            ],
        ];

        ReferralSource::insert($referral_sources);
    }
}
