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
        Schema::create('notas_fiscais', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('paciente');
            $table->smallInteger('valor');
            $table->smallInteger('ano');
            $table->smallInteger('mes');
            $table->string('descricao',800);
            $table->string('link',256)->nullable();
            $table->date('emissao')->nullable();
            $table->enum('status',['importada','emitida']);
            $table->timestamps();

            $table->foreignId('paciente_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas_fiscais');
    }
};
