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
        Schema::create('customers', function (Blueprint $table) {
             $table->id();
            $table->string('name',150);
            $table->string('email',150);
            $table->string('phones',150);
            $table->string('address',150);
            $table->text('notes');
            $table->tinyInteger('active')->default(1)->comment("هل العميل مفعل ام ملغي");



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
