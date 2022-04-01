<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('modelo');
            $table->string('image')->nullable();
            $table->string('frase')->nullable();
            $table->string('verso')->nullable();
            $table->string('spotify')->nullable();
            $table->string('date')->nullable();
            $table->string('pix')->nullable();
            $table->string('pingente')->nullable();
            $table->string('caixa')->nullable();
            $table->string('pin')->nullable();
            $table->float('valor');
            $table->integer('quantidade');
            $table->string('status');
            $table->string('pago');
            $table->string('enviado');
            $table->string('rastreio')->nullable();
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
        Schema::dropIfExists('pedidos');
    }
}
