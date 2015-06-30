<?php 

App::uses('AppModel', 'Model');

class Exercise extends AppModel {
    public $name = "Exercise";
    public $validate = array(
        'quantity' => array(
            'rule' => 'notEmpty'
        ),
    );

    public $belongsTo = array(
        'Discipline' => array(
        	'className' => 'Discipline',
            'foreignKey' => 'discipline_id'
        )
    );
}

?>