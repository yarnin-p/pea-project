<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePeaDeptDimensionFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pea_dept_dimension_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pea_dept_dimension_id')->index();
            $table->string('url')->nullable(true);
            $table->timestamp("created_at")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('pea_dept_dimension_id')->references('id')->on('pea_dept_dimensions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pea_dept_dimension_files');
    }
}
