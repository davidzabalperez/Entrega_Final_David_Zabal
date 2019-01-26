<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->foreign('receiver_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->foreign('sender_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign('mensajes_receiver_id_foreign');
            $table->dropForeign('mensajes_sender_id_foreign');
            $table->dropColumn('receiver_id');
            $table->dropColumn('sender_id');
        });
    }
}
