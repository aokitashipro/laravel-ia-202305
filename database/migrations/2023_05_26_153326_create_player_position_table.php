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
        // 中間テーブル pivot table
        // Laravel推奨はアルファベット順
        // モデル名(単数系)
        Schema::create('player_position', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('player_id'); /* players テーブルのidを指定するカラム */
            $table->bigInteger('position_id'); /* positions テーブルのidを指定するカラム */
            // idと紐づける
            // idの型がbigInteger
            // 型を合わせないとエラーでる
            // foreignId() でもいけるはず
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_position');
    }
};
