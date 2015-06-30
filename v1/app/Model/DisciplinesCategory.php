<?php 

App::uses('AppModel', 'Model');

class DisciplinesCategory extends AppModel {
    public $name = "DisciplinesCategory";
    public $validate = array(
        'name' => array(
            'rule' => 'notEmpty'
        ),
    );

    public $belongsTo = array(
        'Discipline', 'Category'
    );
}

?>