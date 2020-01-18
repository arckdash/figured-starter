<?php

use Illuminate\Database\Migrations\Migration;
use Jenssegers\Mongodb\Schema\Blueprint;

class CreateCommentsTable extends Migration
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
            ->table('comments', function (Blueprint $collection) {
                $collection->index('content');
                $collection->index('created_at');
                $collection->index('post_id');
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
            ->table('comments', function (Blueprint $collection)
            {
                $collection->drop();
            });
    }
}
