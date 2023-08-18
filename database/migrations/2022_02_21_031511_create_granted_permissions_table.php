<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('granted_permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('user')->references('uuid')->on('users');
            $table->foreignId('permission')->references('id')->on('permissions');
            $table->timestamp('grant_date');
            $table->foreignUuid('granted_by')->references('uuid')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('granted_permissions');
    }
};
