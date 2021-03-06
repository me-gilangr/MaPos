<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T00_M_BRG', function (Blueprint $table) {
					$table->char('FK_BRG', 7);
					$table->string('FN_BRG', 50);
					$table->char('FK_SATUAN', 3);
					$table->char('FK_JENIS', 3);
					$table->softDeletes();
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
        Schema::dropIfExists('T00_M_BRG');
    }
}
