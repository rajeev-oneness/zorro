<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncentiveBracketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incentive_brackets', function (Blueprint $table) {
            $table->id();
            $table->integer('no_of_orders');
            $table->float('cost', 8,2);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        $data = [
            ['no_of_orders' => 3, 'cost' => 30],
            ['no_of_orders' => 6, 'cost' => 50],
            ['no_of_orders' => 15, 'cost' => 80],
            ['no_of_orders' => 50, 'cost' => 160],
            ['no_of_orders' => 100, 'cost' => 250],
            ['no_of_orders' => 500, 'cost' => 400],
        ];
        DB::table('incentive_brackets')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incentive_brackets');
    }
}
