<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('seller_profiles_tables', function (Blueprint $table) {
            $table->string('timezone')->nullable();
            $table->string('device_info')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->timestamp('last_login_time')->nullable();
            $table->ipAddress('last_login_ip')->nullable();
            $table->string('last_location')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seller_profiles_tables', function (Blueprint $table) {
            $table->dropColumn([
                'timezone',
                'device_info',
                'latitude',
                'longitude',
                'last_login_time',
                'last_login_ip',
                'last_location',
            ]);
        });
    }
};
