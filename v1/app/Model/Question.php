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
        ),
         'DemosQuestion'
    );

    public function textLike($text='') {
        return $this->find('all', array(
            "conditions" => array(
                "OR" => array(
                    "question_text LIKE" => "%".$text."%",
                    "correct_comment LIKE" => "%".$text."%",
                    "wrong_comment LIKE" => "%".$text."%"
                )
            )
        ));
    }

    public function byDiscipline($did = '') {
        return $this->find('all', array('conditions' => array('discipline_id' => $did)));
    }
}

?>