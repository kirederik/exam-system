<?php 

App::uses('AppModel', 'Model');

class Discipline extends AppModel {
    public $name = "Discipline";
     public $validate = array(
        'name' => array(
            'rule' => 'notEmpty'
        ),
    );
}

?>