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

        if( $action_url == '' )
            $this->assertTrue(false, $action.' does not exist');

        return $this->client->request( $method, $action_url );
    }

    public function assertRequestOk()
    {
        $this->assertStatusCode( 200 );
    }

    public function assertStatusCode( $code )
    {
        $realCode = $this->client->getResponse()->getStatusCode();

        $this->assertEquals( $code, $realCode, "Request was not $code, status code was $realCode" );
    }

    public function assertRedirection( $location = null )
    {
        $response = $this->client->getResponse();
        $statusCode = $response->getStatusCode();

        $isRedirection = in_array($statusCode, array(201, 301, 302, 303, 307, 308));

        $this->assertTrue( $isRedirection, "Last request was not a redirection. Status code was ".$statusCode );
        
        if( $location )
        {
            if(! strpos( $location, '://' ))
                $location = 'http://:/'.$location;

            $this->assertEquals( $location, $response->headers->get('Location'), 'Page was not redirected to the correct place' );
        }
            
    }

}
