<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateProductLocalesTable.
 */
class CreateProductLocalesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_locales', function(Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('product_id');
            $table->string('name');
            $table->text('description');
            $table->string('locale');
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_locales');
	}
}
