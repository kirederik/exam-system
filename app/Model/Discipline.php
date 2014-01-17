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
        ),
        // 'DisciplineCategory' => array(
        //     'className' => 'DisciplinesCategory',
        //     'foreignKey' => 'discipline_id',
        //     'dependent' => true
        // ),
        'Exercise' => array(
            'className' => 'Exercise',
            'foreignKey' => 'discipline_id',
            'dependent' => true
        ),
        'ExamsDiscipline' => array(
            'className' => 'ExamsDiscipline',
            'dependent' => true
        )
    );

    public $hasAndBelongsToMany = array(
        'Category' => array(
            'className' => 'Category',
            'joinTable' => 'disciplines_categories',
            'foreignKey' => 'discipline_id',
            'associationForeignKey' => 'category_id',
        )
    );

}

?>