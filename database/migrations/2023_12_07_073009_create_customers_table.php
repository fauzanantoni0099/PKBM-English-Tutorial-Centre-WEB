<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('program_id');
            $table->unsignedBigInteger('book_id');
            $table->string('class_room');
            $table->decimal('price_class');
            $table->decimal('register');
            $table->string('status_customer');
            $table->string('name');
            $table->string('gender');
            $table->string('birth_date');
            $table->string('school');
            $table->text('address');
            $table->string('phone');
            $table->string('status');
            $table->string('payment_status');
            $table->decimal('payment_price');
            $table->decimal('remaining_payment');
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
        Schema::dropIfExists('customers');
    }
}
