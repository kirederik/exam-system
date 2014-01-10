<?php 

App::uses('AppModel', 'Model');

class DisciplineCategory extends AppModel {
    public $name = "DisciplineCategory";
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