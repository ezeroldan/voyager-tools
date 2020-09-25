<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlideshowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slideshows', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->unsignedBigInteger('categoria_id')->nullable()->default(null);
            $table->foreign('categoria_id')->references('id')->on('slideshows_categorias')->onDelete('cascade');

            $table->string('nombre');

            $table->string('link')->nullable()->default(null);
            $table->boolean('blank')->default(false);

            $table->string('titulo')->nullable()->default(null);
            $table->text('texto')->nullable()->default(null);

            $table->string('imagen')->nullable()->default(null);
            $table->string('color', 7)->nullable()->default(null);

            $table->date('desde')->nullable()->default(null);
            $table->date('hasta')->nullable()->default(null);

            $table->unsignedInteger('orden')->default(0);
            $table->boolean('habilitado')->default(true);

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
        Schema::dropIfExists('slideshows');
    }
}
