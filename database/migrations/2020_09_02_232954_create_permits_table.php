<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permits', function (Blueprint $table) {
            $table->id();
            $table->string('nama_permit');
            $table->string('purpose');
            $table->string('tipe_akses');
            $table->string ('time_akses');
            $table->string('area');
            $table->text('testing');
            $table->text('rollback');
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by')->nullable();           
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
        Schema::dropIfExists('permits');
    }
}
