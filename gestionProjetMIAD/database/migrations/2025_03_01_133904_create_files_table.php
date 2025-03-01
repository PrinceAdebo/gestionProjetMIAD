<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
   
    public function up(): void
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task_id');       // Fichiers liés à une tâche
            $table->string('file_path');                 // Chemin de stockage
            $table->string('original_name')->nullable(); // Nom d’origine du fichier
            $table->string('mime_type')->nullable();     // Type MIME
            $table->timestamps();

            $table->foreign('task_id')
                  ->references('id')->on('tasks')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
