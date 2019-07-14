<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user');
            $table->string('name');
            $table->string('email');
            $table->bigInteger('phone');
            $table->string('address');
            $table->integer('pin');
            $table->timestamps();
            // $table->timestamps('created_at')->useCurrent();
            // $table->timestamps('updated_at')->useCurrent();

            $table->unique(['user', 'email']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
