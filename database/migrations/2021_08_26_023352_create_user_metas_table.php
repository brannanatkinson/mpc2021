<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_metas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('user_id');
            $table->boolean('showTotal')->default(1);
            $table->boolean('show_goal')->default(0);
            $table->boolean('show_items')->default(0);
            $table->boolean('show_rationale')->default(0);
            $table->integer('goal')->nullable();
            $table->string('rationale')->nullable();
            $table->string('thank_you_message')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_metas');
    }
}
