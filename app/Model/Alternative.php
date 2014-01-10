<?php 

App::uses('AppModel', 'Model');

class Alternative extends AppModel {
    public $name = "Alternative";
    public $validate = array(
        'alt_text' => array(
            'rule' => 'notEmpty'
        ),
        'question_id' => array(
            'rule' => 'notEmpty'
        )
    );

    public $belongsTo = array(
        'Question' => array(
            'className' => 'Question',
            'foreignKey' => 'question_id'
        )
    );

}

?>