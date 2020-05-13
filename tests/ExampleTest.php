<?php

namespace EzeRoldan\Voyager\Tests;

use Orchestra\Testbench\TestCase;
use EzeRoldan\Voyager\VoyagerServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [VoyagerServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
