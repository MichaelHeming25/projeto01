<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class Clientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('cpf');
            $table->string('telefone');
            $table->string('email');
            
            $table->string('nascimento');
            $table->string('cidade');
            $table->string('endereco');
            $table->string('nmr_endereco');
            $table->string('bairro');
            $table->string('status');
            // carro
            $table->string('marca');
            $table->string('modelo');
            $table->string('ano');
            $table->string('placa');

            $table->timestamps();
        });

        DB::table('clientes')->insert([
            'name' => 'pedro',
            'cpf' => '05668221522',
            'telefone' => '669962556',
            'email' => 'teste@hotmail.com',
            'nascimento' => '02/06/1996',
            'cidade' => 'Sinop',
            'bairro' => 'violetas',
            'endereco' => 'rua das rosas',
            'nmr_endereco' => '215',
            // carro
            'marca' => 'marca',
            'status' => 'status',
            'modelo' => 'modelo',
            'ano' => '2020',
            'placa' => '26262das',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
