<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'menus', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->integer( 'pid' );
			$table->string( 'name' );
			$table->string( 'language' )->default( 'zh' );
			$table->string( 'icon' );
			$table->string( 'slug' );
			$table->string( 'url' );
			$table->string( 'description' );
			$table->string( 'sort' )->default( 0 );
			$table->enum( 'status', [ 'enable', 'disable' ] )->default( 'enable' );
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'menus' );
	}
}
