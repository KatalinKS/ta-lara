<?php

namespace Tests;

use App\Product\Property\Adapters\PropertyRepositoryForTest;
use App\Product\Property\Intefaces\Repository;

use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';
        $app->make(Kernel::class)->bootstrap();
        $app->instance(Repository::class, PropertyRepositoryForTest::class);
        $app->bind(Repository::class, PropertyRepositoryForTest::class);
        return $app;
    }
}
