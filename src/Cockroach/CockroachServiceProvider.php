<?php

namespace Nbj\Cockroach;

use Illuminate\Database\Connection;
use Illuminate\Support\ServiceProvider;

class CockroachServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
        $this->app->bind('db.connector.cockroach',function() { return new CockroachConnector; });

        Connection::resolverFor('cockroach', function ($connection, $database, $prefix, $config) {
            return new CockroachConnection($connection, $database, $prefix, $config);
        });
    }
}
