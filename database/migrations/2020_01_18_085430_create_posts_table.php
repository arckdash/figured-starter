<?php

use Illuminate\Database\Migrations\Migration;
use Jenssegers\Mongodb\Schema\Blueprint;

class CreatePostsTable extends Migration
{
    /**
     * Name of the database connection to use.
     *
     * @var string
     */
    protected $connection = 'mongodb';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection($this->connection)
            ->table('posts', function (Blueprint $collection) {
                $collection->index('title');
                $collection->index('content');
                $collection->index('user_id');
                $collection->index('created_at');
                $collection->index('updated_at');
                $collection->index('status');
                $collection->index('likes_count');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection($this->connection)
            ->table('posts', function (Blueprint $collection)
            {
                $collection->drop();
            });
    }
}
