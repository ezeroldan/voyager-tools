<?php

use App\Web\Novedades\Novedad;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNovedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novedades', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('categoria_id')->nullable()->default(null);
            $table->foreign('categoria_id')->references('id')->on('novedades_categorias')->onDelete('cascade');

            $table->string('nombre');
            $table->string('slug')->unique();
            $table->enum('estado', [Novedad::ESTADO_BORRADOR, Novedad::ESTADO_PUBLICADO, Novedad::ESTADO_DESHABILITADO])->default(Novedad::ESTADO_BORRADOR);

            $table->text('copete')->nullable();
            $table->longText('description')->nullable();

            $table->text('fotos')->nullable();

            $table->text('seo_description')->nullable()->default(null);
            $table->text('seo_keywords')->nullable()->default(null);

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
        Schema::dropIfExists('novedades');
    }
}
