<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {

    /**
     * FactoryMuff instance
     *
     * @var Zizaco\FactoryMuff\FactoryMuff
     */
    protected $f;

    /**
     * Prepare for tests
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
     * Migrates the database and set the mailer to 'pretend'.
     * This cause the tests to run quicker.
     *
     */
    private function prepareForTests()
    {
        Artisan::call('migrate');
        Mail::pretend(true);
    }
}
