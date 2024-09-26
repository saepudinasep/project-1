<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Kas;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $users = [
            [
                'name' => 'ANGGI NOPRIALDI',
                'nik' => '237210819',
            ],
            [
                'name' => 'REDIKSON FIDELIUS NADEAK',
                'nik' => '237212811',
            ],
            [
                'name' => 'FRANSISCUS FERDIAN',
                'nik' => '237214264',
            ],
            [
                'name' => 'MUS ANGGA SAPUTRA',
                'nik' => '237215704',
            ],
        ];

        foreach ($users as $user) {
            User::factory()->create($user);
        }

        $kases = [
            [
                'name' => 'H2110',
            ],
            [
                'name' => 'H2111',
            ],
            [
                'name' => 'H2112',
            ],
            [
                'name' => 'H2113',
            ],
            [
                'name' => 'H2114',
            ],
            [
                'name' => 'H2115',
            ],
            [
                'name' => 'H2116',
            ],
            [
                'name' => 'H2117',
            ],
            [
                'name' => 'H2118',
            ],

            [
                'name' => 'H2119',
            ],

            [
                'name' => 'H2120',
            ],
        ];

        foreach ($kases as $kas) {
            Kas::factory()->create($kas);
        }

        Branch::factory()->create([
            'name' => "AIR MOLEK"
        ]);
    }
}
