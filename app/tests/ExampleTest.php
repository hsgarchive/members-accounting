<?php

class ExampleTest extends TestCase {

    public function setUp()
    {
        $_SESSION = array('PHP_SAPI' => PHP_SAPI);
        return parent::setUp();
    }

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$crawler = $this->client->request('GET', '/');

		$this->assertTrue($this->client->getResponse()->isOk());
	}

}
