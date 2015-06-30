<?php 
App::uses('CustomPasswordHasher', 'Controller/Component/Auth');

class CustomPasswordHasherTest extends CakeTestCase {
    public function setUp() {
    	parent::setup();
    	$this->PasswordHasher = new CustomPasswordHasher();
		$this->salt = "Zo4rU5Z1YyKJAASY0PT6EUg7BBYdlEhPaNLuxAwU8lqu1ElzHv0Ri7EM6irpx5w";

    }

    public function testHash() {
    	$pwhashed = $this->PasswordHasher->hash("senha123");
    	$hash = hash("sha256", "senha123" . $this->salt);
    	$this->assertEquals($pwhashed, $hash);
    }

    public function testEqualHashed() {
    	$hash = hash("sha256", "senha123" . $this->salt);
    	$this->assertTrue($this->PasswordHasher->check("senha123", $hash));
    }

    public function testNotEqualHashed() {
    	$hash = hash("sha256", "senha123" . $this->salt);
    	$this->assertFalse($this->PasswordHasher->check("senha122", $hash));
    }
}
?>