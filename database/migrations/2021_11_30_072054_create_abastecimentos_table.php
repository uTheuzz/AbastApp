<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbastecimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abastecimentos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_veiculo');
            $table->integer('id_usuario');
            $table->double('km_atual');
            $table->decimal('valor', $precision = 8, $scale = 2);
            $table->decimal('valor_por_litro', $precision = 8, $scale = 2);
            $table->double('qtd_litros');
            $table->date('dt_abastecimento');
            $table->double('latitude');
            $table->double('longitude');
            $table->string('endereco');
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
        Schema::dropIfExists('abastecimentos');
    }
}
