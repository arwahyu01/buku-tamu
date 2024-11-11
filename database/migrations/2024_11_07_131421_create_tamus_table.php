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
        Schema::create('tamus', function (Blueprint $table) {
            $table->uuid("id")->primary();
			$table->string("nama")->nullable();
			$table->string("nik")->nullable();
			$table->string("tempat_lahir")->nullable();
			$table->date("tanggal_lahir")->nullable();
			$table->string("email")->nullable();
			$table->char("no_hp")->nullable();
			$table->text("alamat")->nullable();
			$table->string("jabatan")->nullable();
			$table->string("dari")->nullable();
			$table->text("keperluan")->nullable();
			$table->foreignUuid("unor_id")->nullable()->constrained();
			$table->timestamps();
			$table->softDeletes();
        });

        Schema::table('tamus', function (Blueprint $table) {

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tamus');
    }
};
