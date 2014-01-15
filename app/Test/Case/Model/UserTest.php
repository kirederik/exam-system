<?php 
App::uses('User', 'Model');
App::uses('CustomPasswordHasher', 'Controller/Component/Auth');


class UserTest extends CakeTestCase {
    public $fixtures = array('app.user');

    public function setUp() {
        parent::setUp();
        $this->User = ClassRegistry::init('User');
        $this->hasher = new CustomPasswordHasher();
    }

    public function testExpired() {
        $result = $this->User->expired();
        $expected = array(
        	'0'=> array('User' => array(
				'id' => 3
                ,'logged' => 0
                ,'expiracao' => 12
                ,'logged_time' => ''
                ,'username' => 'usuario_expirado'
                ,'exemplar' => 'expirado'
                ,'fone' => '56565656'
                ,'password' => $this->hasher->hash("senha123")
                ,'role' => 'user'
                ,'nome' => 'Usuario Teste Expirado'
        	))
        );
        $this->assertEquals($expected, $result);
    }

    public function testNameLike() {
        $result = $this->User->nameLike("adm");
        $expected = array(
            'User' => array(
            	'id' => 1
            	, 'logged' => 0
            	, 'expiracao' => 1389749713
            	, 'username' => 'admin'
            	, 'exemplar' => 'admin'
            	, 'fone' => '84-3218-2268'
            	, 'password' => $this->hasher->hash("senha123")
            	, 'role' => 'admin'
            	, 'nome' => 'Portal do Amador'
            	,'logged_time' => null
        	)
        );
        $this->assertEquals($expected, $result);
    }

    public function testExpiredUser() {
        $result = $this->User->expiredUser('expirado');
        $expected = array(
        	'User' => array(
				'id' => 3
                ,'logged' => 0
                ,'expiracao' => 12
                ,'logged_time' => ''
                ,'username' => 'usuario_expirado'
                ,'exemplar' => 'expirado'
                ,'fone' => '56565656'
                ,'password' => $this->hasher->hash("senha123")
                ,'role' => 'user'
                ,'nome' => 'Usuario Teste Expirado'
        	)
        );
        $this->assertEquals($expected, $result);
    }
}
 ?>