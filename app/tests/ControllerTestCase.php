<?php

class ControllerTestCase extends TestCase{
    
    protected $requestInput = array();

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

        return $this->client->request( $method, $action_url, array_merge($params, $this->requestInput) );
    }

    /**
     * Set the post parameters and return this for chainable
     * function call
     * 
     * @param array $params Post paratemers array.
     * @return mixed Value.
     */
    public function withInput( $params )
    {
        $this->requestInput = $params;

        return $this;
    }

    /**
     * Asserts if the request was Ok (200)
     *
     * @return void
     */
    public function assertRequestOk()
    {
        $this->assertStatusCode( 200 );
    }

    /**
     * Asserts if the status code is correct
     *
     * @param $code Correct status code
     * @return void
     */
    public function assertStatusCode( $code )
    {
        $realCode = $this->client->getResponse()->getStatusCode();

        $this->assertEquals( $code, $realCode, "Request was not $code, status code was $realCode" );
    }

    /**
     * Asserts if page was redirected correctly
     *
     * @param $location Location where it should be redirected
     * @return void
     */
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
