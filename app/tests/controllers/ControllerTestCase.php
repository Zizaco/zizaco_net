<?php

class ControllerTestCase extends TestCase{
    
    /**
     * Set session
     */
    public function setUp()
    {
        parent::setUp();

        // Set session
        Input::setSessionStore(app()['session']);
    }
    
}
