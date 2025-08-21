<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{
		$adminRole = Role::findOrCreate('Admin');
		$userRole = Role::findOrCreate('User');

		$admin = User::firstOrCreate(
			['email' => 'admin@pertamina.local'],
			[
				'name' => 'Admin Pertamina',
				'password' => Hash::make('password'),
				'email_verified_at' => now(),
			]
		);
		$admin->assignRole($adminRole);

		$this->call(BuildingCctvSeeder::class);
	}
}