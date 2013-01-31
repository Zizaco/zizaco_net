<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {

    /**
     * FactoryMuff instance
     *
     * @var Zizaco\FactoryMuff\FactoryMuff
     */
    protected $f;

    /**
     * Migrates the database if needed and then setup FactoryMuff
     *
     */
    public function setUp()
    {
        parent::setUp();

        $this->prepareForTests();
    }

    /**
     * Creates the application.
     *
     * @return Symfony\Component\HttpKernel\HttpKernelInterface
     */
    public function createApplication()
    {
    	$unitTesting = true;

        $testEnvironment = 'testing';

    	return require __DIR__.'/../../start.php';
    }

    /**
     * Set the mailer to 'pretend'. This cause the tests to run
     * quicker.
     *
     */
    private function prepareForTests()
    {
        if ( ! defined('PREPARE_ONCE') )
        {
            Mail::pretend(true);
            Artisan::call('migrate');

            define('PREPARE_ONCE', true);
        }
    }
}
