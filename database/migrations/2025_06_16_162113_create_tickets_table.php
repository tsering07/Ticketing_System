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
    Schema::create('tickets', function (Blueprint $table) {
        $table->id();
        $table->string('sub');          
        $table->text('details');        
        $table->enum('urgency', ['High', 'Medium', 'Low']);
        $table->string('dep'); 
        // $table->foreign('dep')->references('name')->on('departments')->onDelete('cascade');
        $table->string('fname');     
        $table->string('aname');
        $table->enum('status', ['pending', 'in_process', 'resolved'])->default('pending');   
        $table->string('image')->nullable(); 
        $table->string('ip_address')->nullable(); 
        $table->date('deadline')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
