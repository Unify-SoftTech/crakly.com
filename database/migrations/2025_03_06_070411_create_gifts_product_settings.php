<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftsProductSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gifts_product_settings', function (Blueprint $table) {
            $table->id();
            $table->string('purchase_product_name',225)->default('coins');
            $table->string('purchase_product_image',225)->default('');
            $table->string('redeem_product_name',225)->default('diamond');
            $table->string('redeem_product_image',225)->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gifts_product_settings');
    }
}
