<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_project');
            $table->string('destination_project');
            $table->date('start_date_project');
            $table->date('end_date_project');
            $table->date('remarks_project');
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
        Schema::dropIfExists('detail_projects');
    }
}
