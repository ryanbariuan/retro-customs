<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name');
        });

        DB::table('categories')->insert(
            [
                ['category_name' => 'Buttons'],
                ['category_name' => 'Lens'],
                ['category_name' => 'Screens'],
                ['category_name' => 'Shells'],
                ['category_name' => 'Batteries']
            ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
