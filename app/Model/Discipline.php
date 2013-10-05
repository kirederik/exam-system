<?php 

App::uses('AppModel', 'Model');

class Discipline extends AppModel {
    public $name = "Discipline";
    public $validate = array(
        'name' => array(
            'rule' => 'notEmpty'
        ),
    );

    public $hasMany = array(
        'Question' => array(
            'className' => 'Question',
            'foreignKey' => 'discipline_id',
            'dependent' => true
        )
    );

}

?>