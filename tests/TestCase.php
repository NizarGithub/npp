<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
// use Laravel\BrowserKitTesting\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    use CreatesApplication;
    public $baseUrl = 'http://npp.dev:8000';
}
