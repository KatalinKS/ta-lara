<?php

namespace Tests;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Console\Application as Artisan;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Str;
use Mockery\Exception\InvalidCountException;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;


}
