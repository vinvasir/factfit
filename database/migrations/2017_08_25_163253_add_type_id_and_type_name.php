<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeIdAndTypeName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('foods', function (Blueprint $table) {
            $table->integer('type_id');
            $table->string('type_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('foods', function (Blueprint $table) {
            $table->dropColumn('type_id');
            $table->dropColumn('type_name');
        });
    }
}
