<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Kas;
use App\Models\Placement;
use App\Models\Role;
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
        $roles = [
            ['name' => 'BM/MH'],
            ['name' => 'CMO']
        ];

        foreach ($roles as $role) {
            Role::factory()->create($role);
        }

        $users = [
            [
                'name' => 'SAEPPUL ACHMAD',
                'nik' => '00008001',
                'role_id' => 1
            ],
            [
                'name' => 'ANGGI NOPRIALDI',
                'nik' => '237210819',
                'role_id' => 2
            ],
            [
                'name' => 'REDIKSON FIDELIUS NADEAK',
                'nik' => '237212811',
                'role_id' => 2
            ],
            [
                'name' => 'FRANSISCUS FERDIAN',
                'nik' => '237214264',
                'role_id' => 2
            ],
            [
                'name' => 'MUS ANGGA SAPUTRA',
                'nik' => '237215704',
                'role_id' => 2
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


        $placements = [
            [
                'user_id' => 2,
                'branch_id' => 1,
                'kas_id' => 1,
            ],
            [
                'user_id' => 2,
                'branch_id' => 1,
                'kas_id' => 2,
            ],
            [
                'user_id' => 3,
                'branch_id' => 1,
                'kas_id' => 3,
            ],
            [
                'user_id' => 3,
                'branch_id' => 1,
                'kas_id' => 4,
            ],
            [
                'user_id' => 4,
                'branch_id' => 1,
                'kas_id' => 5,
            ],
            [
                'user_id' => 4,
                'branch_id' => 1,
                'kas_id' => 6,
            ],
            [
                'user_id' => 5,
                'branch_id' => 1,
                'kas_id' => 7,
            ],
            [
                'user_id' => 5,
                'branch_id' => 1,
                'kas_id' => 8,
            ],
            // Add more placements as needed
        ];

        foreach ($placements as $placement) {
            Placement::factory()->create($placement);
        }
    }
}
