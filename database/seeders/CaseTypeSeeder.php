<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CaseType;

class CaseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $case_types =   [
            [
                'id' => 1,
                'description' => 'Undefined',
                'is_active' => true
            ],
            [
                'id' => 2,
                'description' => 'Urgent',
                'is_active' => false
            ],
            [
                'id' => 9,
                'description' => 'Legal research reply received',
                'is_active' => true
            ],
            [
                'id' => 10,
                'description' => 'Upcoming appointment',
                'is_active' => true
            ],
            [
                'id' => 11,
                'description' => 'Phone tag',
                'is_active' => true
            ],
            [
                'id' => 12,
                'description' => 'Email tag',
                'is_active' => true
            ],
            [
                'id' => 15,
                'description' => 'Needs to be contacted',
                'is_active' => false
            ],
            [
                'id' => 20,
                'description' => 'Case pending',
                'is_active' => false
            ],
            [
                'id' => 21,
                'description' => 'Never been contacted',
                'is_active' => true
            ],
            [
                'id' => 22,
                'description' => '1 message left',
                'is_active' => true
            ],
            [
                'id' => 23,
                'description' => '2 messages left',
                'is_active' => true
            ],
            [
                'id' => 24,
                'description' => '3+ messages left',
                'is_active' => true
            ],
            [
                'id' => 25,
                'description' => 'Voicemail, helped',
                'is_active' => true
            ],
            [
                'id' => 51,
                'description' => 'Case referred (external)',
                'is_active' => true
            ],
            [
                'id' => 52,
                'description' => 'Case referred (legal research)',
                'is_active' => true
            ],
            [
                'id' => 60,
                'description' => 'Client assisted, likely to call again',
                'is_active' => false
            ],
            [
                'id' => 61,
                'description' => 'Client assisted',
                'is_active' => true
            ],
            [
                'id' => 90,
                'description' => 'Cannot contact',
                'is_active' => true
            ],
            [
                'id' => 96,
                'description' => 'Timed out',
                'is_active' => true
            ],
            [
                'id' => 97,
                'description' => 'Assistance not required',
                'is_active' => true
            ],
            [
                'id' => 98,
                'description' => 'Client assisted, not likely to call again',
                'is_active' => false
            ],
            [
                'id' => 99,
                'description' => 'Case complete',
                'is_active' => false
            ],
            [
                'id' => 100,
                'description' => 'Urgent, foreign language',
                'is_active' => true
            ],
            [
                'id' => 101,
                'description' => 'Urgent, time sensitive',
                'is_active' => true
            ],
            [
                'id' => 102,
                'description' => 'Urgent, upcoming court date',
                'is_active' => true
            ],
            [
                'id' => 103,
                'description' => 'Client assisted and surveyed',
                'is_active' => false
            ],
        ];

        CaseType::insert($case_types);
    }
}
