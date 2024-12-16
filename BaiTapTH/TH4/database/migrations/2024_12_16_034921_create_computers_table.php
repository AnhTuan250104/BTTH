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
        Schema::create('computers', function (Blueprint $table) {
            $table->id(); // INT, Primary Key
            $table->string('computer_name', 50); // VARCHAR(50)
            $table->string('model', 100); // VARCHAR(100)
            $table->string('operating_system', 50); // VARCHAR(50)
            $table->string('processor', 50); // VARCHAR(50)
            $table->integer('memory'); // INT
            $table->boolean('available')->default(true); // BOOLEAN
            $table->timestamps(); // created_at, updated_at
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computers');
    }
};