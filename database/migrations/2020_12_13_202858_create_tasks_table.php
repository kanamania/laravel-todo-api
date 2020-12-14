<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('modified_by');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('modified_by')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::create('tasks_types_attributes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('default_values')->default("yes, no");
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('modified_by');
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('modified_by')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::create('tasks_types_to_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task_type_id');
            $table->unsignedBigInteger('task_type_attribute_id');
            $table->timestamps();
            $table->foreign('task_type_id')->references('id')->on('tasks_types')->onDelete('cascade');
            $table->foreign('task_type_attribute_id')->references('id')->on('tasks_types_attributes')->onDelete('cascade');
        });
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('color')->default('fff');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('modified_by');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('modified_by')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->unsignedBigInteger('type_id')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('modified_by');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('type_id')->references('id')->on('tasks_types')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('modified_by')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::create('tasks_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks_types_to_attributes');
        Schema::dropIfExists('tasks_types_attributes');
        Schema::dropIfExists('tasks_types');
        Schema::dropIfExists('tasks_statuses');
        Schema::dropIfExists('statuses');
        Schema::dropIfExists('tasks');
    }
}
