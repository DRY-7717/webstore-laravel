<?php

use App\Models\Category;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Category::class)->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');

            $table->text('address_one')->nullable();
            $table->text('address_two')->nullable();
            $table->foreignIdFor(Province::class)->nullable();
            $table->foreignIdFor(Regency::class)->nullable();
            $table->integer('zip_code')->nullable();
            $table->string('country')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('store_name')->nullable();
            $table->integer('store_status')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            
            $table->string('role')->default('USER');
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
