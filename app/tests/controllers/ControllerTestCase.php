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

    /**
     * Request an URL by the action name
     * 
     * @param string $method
     * @param string $action
     *
     * @return Symfony\Component\DomCrawler\Crawler
     */
    public function requestAction( $method, $action, $params = array())
    {
        $action_url = URL::action($action, $params);

        if ($action_url == '')
            $this->assertTrue(false, $action.' does not exist');

        return $this->client->request( $method, $action_url );
    }

}
