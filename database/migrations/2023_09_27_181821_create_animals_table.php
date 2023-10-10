<?php

use App\Models\Customer;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->references('id')->on('customers')->cascadeOnDelete();
            $table->string('name');
            $table->string('especie');
            $table->string('raca');
            $table->date('data_nascimento');
            $table->boolean('flagidoso')->nullable();
            $table->boolean('flagcardiopata')->nullable();
            $table->boolean('flagepiletico')->nullable();
            $table->boolean('flaglesionado')->nullable();
            $table->boolean('flagalergico')->nullable();
            $table->text('observacao')->nullable();
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
        Schema::dropIfExists('animals');
    }
}
