<?php 
App::uses('CustomPasswordHasher', 'Controller/Component/Auth', 'AppModel', 'Model');

class User extends AppModel {
    public $name = 'User';
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        )
    );

    public $belongsTo = array('Category');

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new CustomPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        if (!isset($this->data[$this->alias]['not'])) {
            if(isset($this->data[$this->alias]['extend'])) {
                $t = $this->data[$this->alias]['extend'];
                $this->data[$this->alias]['expiracao'] = (int) time() + ( ((int)$t) * 24 * 60 * 60);
            } else if(!isset($this->data[$this->alias]['expiracao'])) {
                $this->data[$this->alias]['expiracao'] = time() + (32 * 24 * 60 * 60);
            }
        }
        return true;    
    }

    public function expired() {
        return $this->find('all', 
            array('limit' => 30, 'conditions' => array(
                'expiracao <' => time()
            )
        ));
    }

    public function logged() {
        return $this->find('all', array('conditions' => array(
            'logged' => 1,
            'logged_time >' => time() - (60 * 60) //logados a 1 hora
        )));
    }

    public function nameLike($name='') {
        return $this->find("all", array( 
            'conditions'=> array('OR' =>
                array(
                    'nome LIKE' => '%'.$name.'%',
                    'username LIKE'=> '%'.$name.'%'
                )
            )
        ));
    }

    public function expiredUser($username = '') {
        return $this->find("first", array('conditions' => 
            array(
                'AND' => 
                    array(
                        'username LIKE'=> '%'.$username.'%', 
                        'expiracao <' => time()
                    )
                )
            )
        );
    }
}
?>