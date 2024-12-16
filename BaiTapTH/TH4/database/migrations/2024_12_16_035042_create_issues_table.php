<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id(); // INT, Primary Key
            $table->unsignedBigInteger('computer_id'); // FK to computers.id
            $table->string('reported_by', 50)->nullable(); // VARCHAR(50)
            $table->dateTime('reported_date'); // DATETIME
            $table->text('description'); // TEXT
            $table->enum('urgency', ['Low', 'Medium', 'High'])->default('Low'); // ENUM
            $table->enum('status', ['Open', 'In Progress', 'Resolved'])->default('Open'); // ENUM
            $table->timestamps(); // created_at, updated_at

            // Define Foreign Key
            $table->foreign('computer_id')->references('id')->on('computers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};