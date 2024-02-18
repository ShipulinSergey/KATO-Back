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
        Schema::create('conferences', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('subtitle');
            $table->string('location');
            $table->date('date_start');
            $table->date('date_end');
            $table->text('greetings');
            $table->unsignedBigInteger('organ_contact_id')->nullable();
            $table->unsignedBigInteger('editor_contact_id')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->index('organ_contact_id', 'organ_contacts_idx');
            $table->index('editor_contact_id', 'editor_contacts_idx');

            $table->foreign('organ_contact_id', 'organ_contacts_fk')->on('contacts')->references('id');
            $table->foreign('editor_contact_id', 'editor_contacts_fk')->on('contacts')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conferences');
    }
};
