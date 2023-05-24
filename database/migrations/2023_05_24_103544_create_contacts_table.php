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
        // お問い合わせフォーム
        // 名前、メール、
        // 性別gender 男、女、その他、
        // 年齢age、
        // お問い合わせ内容message,
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // nameという文字列
            $table->string('email');
            $table->tinyInteger('gender');
            $table->integer('age');
            $table->text('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
