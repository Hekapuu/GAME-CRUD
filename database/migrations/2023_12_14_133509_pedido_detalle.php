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
    Schema::create('pedido_detalle', function (Blueprint $table) {
      $table->ulid('id_pedidoDetalle')->primary();
      $table->integer('cantidad');
      $table->foreignUlid('pedido_id')->constrained('pedidos', 'id_pedido');
      $table->foreignUlid('producto_id')->constrained('producto', 'id_producto');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('pedido_detalle');
  }
};
