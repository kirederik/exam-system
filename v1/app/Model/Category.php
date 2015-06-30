<?php 

App::uses('AppModel', 'Model');

class Category extends AppModel {
    public $name = "Category";
    
    public $validate = array(
        'name' => array(
            'rule' => 'notEmpty'
        ),
    );

    public  $hasMany = array(
        'Exam' => array(
            'className' => 'Exam',
            'dependent' => true
        ),
        'Demo' => array(
            'className' => 'Demo',
            'dependent' => true
        ),
        'User'
    );

    // public $hasAndBelongsToMany = array(
    //     'Discipline' => array(
    //         'className' => 'Discipline',
    //         'joinTable' => 'disciplines_categories',
    //         'foreignKey' => 'category_id',
    //         'associationForeignKey' => 'discipline_id',
    //     )
    // )

    public $hasAndBelongsToMany = array(
        'Discipline' => array(
            'className'              => 'Discipline',
            'joinTable'              => 'disciplines_categories',
            'foreignKey'             => 'category_id',
            'associationForeignKey'  => 'discipline_id'
        )
    );
    //     'Instrutor' => array(
    //         'className'              => 'Instrutor',
    //         'joinTable'              => 'instrutors_turmas',
    //         'foreignKey'             => 'codigo_turma',
    //         'associationForeignKey'  => 'codigo_instrutor',
    //         'with'                   => 'InstrutorsTurmas',
    //         'unique'                 => true
    //     ),
    //     'Equipamento' => array(
    //         'className'              => 'Equipamento',
    //         'joinTable'              => 'equipamentos_turmas',
    //         'foreignKey'             => 'codigo_turma',
    //         'associationForeignKey'  => 'codigo_equipamento',
    //         'with'                   => 'EquipamentosTurmas',
    //         'unique'                 => true
    //     )
    // )
}

?>