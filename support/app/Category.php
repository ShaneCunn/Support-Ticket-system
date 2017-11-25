<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function up()
    {
        // tickets table migration showing only the up() schemas with our modifications
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
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
        Schema::dropIfExists('categories');
    }
}
