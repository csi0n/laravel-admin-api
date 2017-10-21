<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		factory( \csi0n\LaravelAdminApi\System\Entities\User::class )->create( [
			'email'    => 'admin@admin.com',
			'password' => bcrypt( '123456' )
		] );

		factory( \csi0n\LaravelAdminApi\System\Entities\User::class )->create( [
			'email'    => 'test@test.com',
			'password' => bcrypt( '123456' )
		] );
	}
}
