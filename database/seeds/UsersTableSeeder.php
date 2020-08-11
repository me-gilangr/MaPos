<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			$user = [
				[
					'name' => 'admin',
					'email' => 'admin@mail.com',
					'password' => bcrypt('admin')
				]
			];

			foreach ($user as $key => $value) {
				try {
					$create = User::firstOrCreate($value);
					$create->assignRole($value['name']);
				} catch (\Exception $e) {
					dd($e);
				}
			}
		}
}
