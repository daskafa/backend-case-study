<?php

namespace Database\Seeders;

use App\Models\Developer;
use Exception;
use Illuminate\Database\Seeder;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $developerInformationArr = [
            [
                'full_name' => 'DEV1',
                'duration' => 1,
                'difficulty' => 1,
            ],
            [
                'full_name' => 'DEV2',
                'duration' => 1,
                'difficulty' => 2,
            ],
            [
                'full_name' => 'DEV3',
                'duration' => 1,
                'difficulty' => 3,
            ],
            [
                'full_name' => 'DEV4',
                'duration' => 1,
                'difficulty' => 4,
            ],
            [
                'full_name' => 'DEV5',
                'duration' => 1,
                'difficulty' => 5,
            ],
        ];

        foreach ($developerInformationArr as $key => $developerInformation) {
            $developerInformationArr[$key]['created_at'] = now();
        }

        $developerBulkInsert = Developer::insert($developerInformationArr);

        if (!$developerBulkInsert) {
            $this->command->error('Developer seeder failed.');
        }
    }
}
