<?php
App::uses('UsersController', 'Controller');
App::uses('User', 'Model');

class UsersControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	
	public $fixtures = array('app.user');

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
        $result = $this->testAction('/users/index');
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {
	}

}
