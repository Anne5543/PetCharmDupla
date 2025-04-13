<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 40); 
            $table->string('email', 45);
            $table->int('idade'); 
            $table->string('nivel_escolar'); 
            $table->string('telefone', 11);
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};
