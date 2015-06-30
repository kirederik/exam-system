<?php
App::uses('CustomPasswordHasher', 'Controller/Component/Auth');

class UserFixture extends CakeTestFixture {

    // Optional.
    // Set this property to load fixtures to a different test datasource
    public $useDbConfig = 'test';

    // CREATE TABLE users (
    //     id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //     username varchar(50) UNIQUE NOT NULL,
    //     exemplar varchar(15) UNIQUE NOT NULL,
    //     fone varchar(15) NOT NULL,
    //     password varchar(250) NOT NULL,
    //     role VARCHAR(20) default 'user',
    //     nome varchar(55) NOT NULL,
    //     logged int default 0,
    //     logged_time int,
    //     expiracao bigint(20) DEFAULT NULL
    // );
    public $fields = array(
        'id' => array('type' => 'integer', 'key' => 'primary'),
        'logged' => array('type' => 'integer', 'default' => 0),
        'logged_time' => array('type' => 'integer'),
        'expiracao' => array('type' => 'integer', 'null' => false),
        'username' => array(
            'type' => 'string',
            'length' => 50,
            'null' => false
        ),
        'exemplar' => array(
            'type' => 'string',
            'length' => 15,
            'null' => false,
            'unique' => true
        ),
        'fone' => array(
            'type' => 'string',
            'length' => 15,
            'null' => false,
            'unique' => true
        ),
        'password' => array(
            'type' => 'string',
            'length' => 250,
            'null' => false
        ),
        'role' => array(
            'type' => 'string',
            'length' => 20
        ),
        'nome' => array(
            'type' => 'string',
            'length' => 55,
            'null' => false
        ),

    );
    public function init() {
        $hasher = new CustomPasswordHasher();
        $this->records = array(
            array(
                'id' => 1
                , 'logged' => 0
                , 'expiracao' => 1389749713
                , 'username' => 'admin'
                , 'exemplar' => 'admin'
                , 'fone' => '84-3218-2268'
                , 'password' => $hasher->hash("senha123")
                , 'role' => 'admin'
                , 'nome' => 'Portal do Amador'
            ),
            array(
                'id' => 2
                ,'logged' => 0
                ,'expiracao' => 1389749713
                ,'username' => 'usuario'
                ,'exemplar' => 'usuario'
                ,'fone' => '56565656'
                ,'password' => $hasher->hash("senha123")
                ,'role' => 'user'
                ,'nome' => 'Usuario Teste'
            ),
            array(
                'id' => 3
                ,'logged' => 0
                ,'expiracao' => 12
                ,'username' => 'usuario_expirado'
                ,'exemplar' => 'expirado'
                ,'fone' => '56565656'
                ,'password' => $hasher->hash("senha123")
                ,'role' => 'user'
                ,'nome' => 'Usuario Teste Expirado'
            )
        );
        parent::init();
    }
}
?>