<?php 

App::uses('AppModel', 'Model');

class Question extends AppModel {
    public $name = "Question";
    public $validate = array(
        'question_text' => array(
            'rule' => 'notEmpty'
        ),
        'discipline_id' => array(
            'rule' => 'notEmpty'
        )
    );

    public $belongsTo = array(
        'Discipline' => array(
            'className' => 'Discipline',
            'foreignKey' => 'discipline_id'
        )
    );

    public $hasMany = array(
        'Alternative' => array(
            'className' => 'Alternative',
            'foreignKey' => 'question_id',
            'dependent'=> true,

        )
    );

    // public $hasAndBelongsToMany = array(
    //     'Discipline' => array(
    //         'className'              => 'Discipline',
    //         'joinTable'              => 'disciplines_categories',
    //         'foreignKey'             => 'category_id',
    //         'associationForeignKey'  => 'discipline_id',
    //         'unique'                 => true
    //     ),
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