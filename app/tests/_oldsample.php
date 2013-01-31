<?php

class ExampleTest {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$crawler = $this->client->request('GET', '/');

		// $this->client->getResponse()->isOk()

		//$this->assertTrue(true);

		//$this->assertCount(1, $crawler->filter('h1:contains("Hello World!")'));
	}

}
