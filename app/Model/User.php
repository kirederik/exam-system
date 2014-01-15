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

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new CustomPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        if(isset( $this->data[$this->alias]['extend'])) {
            $t = $this->data[$this->alias]['extend'];
            $this->data[$this->alias]['expiracao'] = (int) time() + ( ((int)$t) * 24 * 60 * 60);
        } else if($this->params['action'] == 'add') {
            $this->data[$this->alias]['expiracao'] = time() + (32 * 24 * 60 * 60);
        }
        return true;    
    }
}
?>