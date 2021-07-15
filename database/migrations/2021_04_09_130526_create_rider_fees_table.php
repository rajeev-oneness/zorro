<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiderFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rider_fees', function (Blueprint $table) {
            $table->id();
            $table->float('lower', 8,2);
            $table->float('upper', 8,2);
            $table->float('cost', 8,2);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        $data = [
            ['lower' => 0, 'upper' => 3, 'cost' => 10],
            ['lower' => 3.01, 'upper' => 6, 'cost' => 20],
            ['lower' => 6.01, 'upper' => 15, 'cost' => 30],
            ['lower' => 15.01, 'upper' => 50, 'cost' => 60],
            ['lower' => 50.01, 'upper' => 100, 'cost' => 90],
            ['lower' => 100.01, 'upper' => 500, 'cost' => 150],
        ];
        DB::table('rider_fees')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rider_fees');
    }
}
