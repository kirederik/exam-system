<?php 
App::uses('AbstractPasswordHasher', 'Controller/Component/Auth');

class CustomPasswordHasher extends AbstractPasswordHasher {
	public $salt = "Zo4rU5Z1YyKJAASY0PT6EUg7BBYdlEhPaNLuxAwU8lqu1ElzHv0Ri7EM6irpx5w";
    public function hash($password) {
    	return hash('sha256', $password . "Zo4rU5Z1YyKJAASY0PT6EUg7BBYdlEhPaNLuxAwU8lqu1ElzHv0Ri7EM6irpx5w");
    }

    public function check($password, $hashedPassword) {
        return $hashedPassword == $this->hash($password);
    }
} ?>