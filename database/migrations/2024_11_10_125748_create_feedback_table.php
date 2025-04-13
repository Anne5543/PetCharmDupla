<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id(); 
            $table->string('nome', 40); 
            $table->string('email', 45); 
            $table->string('telefone', 45);
            $table->string('comentario', 255);
            $table->timestamps(); 
        })  ;
    }

    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
