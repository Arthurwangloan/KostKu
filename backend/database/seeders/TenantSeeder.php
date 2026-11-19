<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tenant;
use Illuminate\Support\Facades\Hash;

class TenantSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::updateOrCreate(
            ['email' => 'tenant@kostmanage.com'],
            [
                'name' => 'Penghuni Contoh',
                'password' => Hash::make('Tenant12345'),
            ]
        );

        Tenant::updateOrCreate(
            ['user_id' => $user->id],
            [
                'phone' => '081234567890',
                'address' => 'Surabaya',
                'identity_number' => '000000000001',
            ]
        );
    }
}
