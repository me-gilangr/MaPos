<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			$role = [
				[
					'name' => 'admin',
					'guard_name' => 'web'
				],
				[
					'name' => 'karyawan',
					'guard_name' => 'web'
				],
			];
			
			foreach ($role as $key => $value) {
				try {
					$craete = Role::firstOrCreate($value);
				} catch (\Exception $e) {
					dd($e);
				}
			}
    }
}
