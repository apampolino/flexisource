<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            // $table->bigIncrements('id');
            // $table->timestamps();
            $table->integer('chance_of_playing_next_round')->default(0)->nullable(true);
            $table->integer('chance_of_playing_this_round')->default(0)->nullable(true);
            $table->integer('code')->default(0)->nullable(true);
            $table->integer('cost_change_event')->default(0)->nullable(true);
            $table->integer('cost_change_event_fall')->default(0)->nullable(true);
            $table->integer('cost_change_start')->default(0)->nullable(true);
            $table->integer('cost_change_start_fall')->default(0)->nullable(true);
            $table->integer('dreamteam_count')->default(0)->nullable(true);
            $table->integer('element_type')->default(0)->nullable(true);
            $table->double('ep_next', 8, 2)->default(0)->nullable(true);
            $table->double('ep_this', 8, 2)->default(0)->nullable(true);
            $table->integer('event_points')->default(0)->nullable(true);
            $table->string('first_name');
            $table->double('form', 8, 2)->default(0)->nullable(true);
            $table->string('id');
            $table->boolean('in_dreamteam');
            $table->string('news')->nullable(true);
            $table->string('news_added')->nullable(true);
            $table->integer('now_cost')->default(0)->nullable(true);
            $table->string('photo')->nullable(true);
            $table->double('points_per_game', 8, 2)->default(0)->nullable(true);
            $table->string('second_name');
            $table->double('selected_by_percent', 8, 2)->default(0)->nullable(true);
            $table->boolean('special');
            $table->integer('squad_number')->nullable(true);
            $table->string('status', 1)->nullable(true);
            $table->integer('team')->default(0)->nullable(true);
            $table->integer('team_code')->default(0)->nullable(true);
            $table->integer('total_points')->default(0)->nullable(true);
            $table->integer('transfers_in')->default(0)->nullable(true);
            $table->integer('transfers_in_event')->default(0)->nullable(true);
            $table->integer('transfers_out')->default(0)->nullable(true);
            $table->integer('transfers_out_event')->default(0)->nullable(true);
            $table->double('value_form', 8, 2)->default(0)->nullable(true);
            $table->double('value_season', 8, 2)->default(0)->nullable(true);
            $table->string('web_name')->nullable(true);
            $table->integer('minutes')->default(0)->nullable(true);
            $table->integer('goals_scored')->default(0)->nullable(true);
            $table->integer('assists')->default(0)->nullable(true);
            $table->integer('clean_sheets')->default(0)->nullable(true);
            $table->integer('goals_conceded')->default(0)->nullable(true);
            $table->integer('own_goals')->default(0)->nullable(true);
            $table->integer('penalties_saved')->default(0)->nullable(true);
            $table->integer('penalties_missed')->default(0)->nullable(true);
            $table->integer('yellow_cards')->default(0)->nullable(true);
            $table->integer('red_cards')->default(0)->nullable(true);
            $table->integer('saves')->default(0)->nullable(true);
            $table->integer('bonus')->default(0)->nullable(true);
            $table->integer('bps')->default(0)->nullable(true);
            $table->integer('influence')->default(0)->nullable(true);
            $table->integer('creativity')->default(0)->nullable(true);
            $table->integer('threat')->default(0)->nullable(true);
            $table->integer('ict_index')->default(0)->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
