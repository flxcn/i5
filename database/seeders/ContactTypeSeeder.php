<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactType;

// 1 Create client record 1
// 2 Create new case record 0
// 10 Called, left message 1
// 11 Called, no answer 1
// 12 Called, helped by phone 1
// 13 Called, wrong number 1
// 90 Case referred to external agency 0
// 20 Call received, helped by phone 1
// 21 Voicemail received 1
// 91 Case referred to GBLS Office 0
// 92 Case referred to Legal Research 1
// 99 Case marked complete 0
// 93 Case referred to PBH Office 0
// 24 Legal Research replied to question 0
// 30 Met with client 1
// 97 Assistance not required 1
// 31 Appointment scheduled 1
// 15 Email Received 1
// 16 Email, Response Sent 1
// 14 Called, number not in service 1
// 3 Survey: Administered over phone 1
// 4 Survey: Sent email 1
// 5 Survey: Emailed survey completed 1

class ContactTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contact_types =   [
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

        ContactType::insert($contact_types);
    }
}
