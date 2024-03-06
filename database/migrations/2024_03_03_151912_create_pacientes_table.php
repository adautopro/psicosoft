<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('notionid',100);
            $table->string('nome',100);
            $table->string('cpf',11);
            $table->string('email',150);
            $table->string('logradouro',100);
            $table->string('numero',5);
            $table->string('complemento',100);
            $table->string('bairro',50);
            $table->string('cidade',50);
            $table->string('uf',2);
            $table->string('país',30);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
//https://www.notion.so/Ana-Julia-Peruci-Pansani-f790b33f1e874cba8809c47c2078bc1a?pvs=4
