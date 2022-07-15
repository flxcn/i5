<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CaseType;

// 99 Case complete 1
// 20 Case Pending 1
// 51 Case referred (external) 0
// 52 Case referred (Legal Research) 0
// 1 Urgent 1
// 21 Never been contacted 0
// 9 Legal Research reply received 0
// 90 Cannot contact 0
// 60 Client assisted, likely to call again 1
// 98 Client assisted, not likely to call again 1
// 11 Phone tag 0
// 22 1 message left 0
// 23 2 messages left 0
// 24 3+ messages left 0
// 15 Needs to be contacted 1
// 61 Client assisted 0
// 97 Assistance not required 0
// 10 Upcoming Appointment 0
// 25 Voicemail, Helped 0
// 12 Email Tag 0
// 0 Undefined 0
// 96 Timed Out 0
// 100 Urgent, foreign language 0
// 101 Urgent, time sensitive 0
// 102 Urgent, upcoming court date 0

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
        ];

        CaseType::insert($case_types);
    }
}
