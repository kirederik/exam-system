<?php 

App::uses('AppModel', 'Model', 'Question');

class Exam extends AppModel {
    public $name = "Exam";

    public $belongsTo = array(
        'Category' => array(
        	'className' => 'Category',
            'foreignKey' => 'category_id'
        ),

    );

    public $hasMany = array(
        'ExamsDiscipline' => array(
            'className' => 'ExamsDiscipline',
            'dependent' => true
        )
    );
}

?>