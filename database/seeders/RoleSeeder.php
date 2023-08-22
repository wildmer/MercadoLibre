<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
	public function run()
	{
		$admin = Role::create(['name' => 'admin']);
		Role::create(['name' => 'user']);
	}
}