<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academicos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('privilegio')->default(false);
            // $table->integer('categoria_id')->unsigned()->nullable(); por el momento no lo necesita por que ya tiene la llave foranea la tabla categorias
            
            $table->rememberToken();

            $table->timestamps();
        });
        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->integer('academico_id')->unsigned()->nullable();           
            $table->timestamps();
        });
        Schema::table('categorias',function(Blueprint $table){
            $table->foreign('academico_id')->references('id')->on('academicos')->onDelete('cascade')->onUpdate('cascade');
        });
        
        
        Schema::create('planes_de_acciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->integer('categoria_id')->unsigned()->nullable();
            $table->boolean('completado')->default(false);
            $table->timestamps();
        });
        Schema::table('planes_de_acciones',function(Blueprint $table){
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('evidencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_archivo');
            $table->string('tipo_archivo');
            $table->string('archivo_bin');
            $table->timestamps();
        });

        Schema::create('evidencias_planes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plan_accion_id')->nullable()->unsigned();
            $table->integer('evidencia_id')->nullable()->unsigned();
        });

        Schema::table('evidencias_planes',function(Blueprint $table){
            $table->foreign('plan_accion_id')->references('id')->on('planes_de_acciones')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('evidencia_id')->references('id')->on('evidencias')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academicos');
        Schema::dropIfExists('categorias');
        Schema::dropIfExists('planes_de_acciones');
        Schema::dropIfExists('evidencias');
        Schema::dropIfExists('evidencias_planes');
        Schema::dropIfExists('password_resets');
    }
}
