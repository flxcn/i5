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
        CaseType::truncate();

        $case_types =   [
            [
                'id' => 1,
                'description' => 'Create client record',
                'is_active' => true
            ],
            [
                'id' => 2,
                'description' => 'Create new case record',
                'is_active' => false
            ],
            [
                'id' => 10,
                'description' => 'Called, left message',
                'is_active' => true
            ],
            [
                'id' => 11,
                'description' => 'Called, no answer',
                'is_active' => true
            ],
            [
                'id' => 12,
                'description' => 'Called, helped by phone',
                'is_active' => true
            ],
            [
                'id' => 13,
                'description' => 'Called, wrong number',
                'is_active' => true
            ],
            [
                'id' => 90,
                'description' => 'Case referred to external agency',
                'is_active' => false
            ],
            [
                'id' => 20,
                'description' => 'Call received, helped by phone',
                'is_active' => true
            ],
            [
                'id' => 21,
                'description' => 'Voicemail received',
                'is_active' => true
            ],
            [
                'id' => 91,
                'description' => 'Case referred to GBLS Office',
                'is_active' => false
            ],
            [
                'id' => 92,
                'description' => 'Case referred to Legal Research',
                'is_active' => true
            ],
            [
                'id' => 99,
                'description' => 'Case marked complete',
                'is_active' => false
            ],
            [
                'id' => 93,
                'description' => 'Case referred to PBH Office',
                'is_active' => false
            ],
            [
                'id' => 24,
                'description' => 'Legal Research replied to question',
                'is_active' => false
            ],
            [
                'id' => 30,
                'description' => 'Met with client',
                'is_active' => true
            ],
            [
                'id' => 97,
                'description' => 'Assistance not required',
                'is_active' => true
            ],
            [
                'id' => 31,
                'description' => 'Appointment scheduled',
                'is_active' => true
            ],
            [
                'id' => 15,
                'description' => 'Email Received',
                'is_active' => true
            ],
            [
                'id' => 16,
                'description' => 'Email, Response Sent',
                'is_active' => true
            ],
            [
                'id' => 14,
                'description' => 'Called, number not in service',
                'is_active' => true
            ],
            [
                'id' => 3,
                'description' => 'Survey: Administered over phone',
                'is_active' => true
            ],
            [
                'id' => 4,
                'description' => 'Survey: Sent email',
                'is_active' => true
            ],
            [
                'id' => 5,
                'description' => 'Survey: Emailed survey completed',
                'is_active' => true
            ],
        ];

        CaseType::insert($case_types);
    }
}
