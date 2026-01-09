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
        Schema::table('students', function (Blueprint $table) {
            // This adds the column to your MySQL table
            $table->string('middle_name')->nullable()->after('first_name'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
   public function down()
{
    Schema::table('students', function (Blueprint $table) {
        // This allows you to undo the change if needed
        $table->dropColumn('middle_name');
    });
}

};
