<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Phone;
use App\Models\Organization;

class PhoneSeeder extends Seeder
{
    public function run(): void
    {
        $organizations = Organization::all();

        $numbers = [
            '+12025550101', '+12025550202', '+12025550303',
            '+440207700101', '+440207700202', '+440207700303',
            '+81312345678', '+81387654321', '+4930123456',
        ];

        foreach ($organizations as $index => $org) {
            Phone::create([
                'number' => $numbers[$index % count($numbers)],
                'organization_id' => $org->id
            ]);
        }
    }
}
