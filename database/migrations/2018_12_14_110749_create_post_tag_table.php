<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->primary(['post_id', 'tag_id']); // That is a coumpound field use a primary key
            $table->unsignedInteger('post_id');
            $table->unsignedInteger('tag_id');
            // These 2 lines acts as foreign key and provide that in case of post or tag deletion, their associated post_tag_id will be deleted as well from the pivot table.
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade'); 
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
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
        Schema::dropIfExists('post_tag');
    }
}
