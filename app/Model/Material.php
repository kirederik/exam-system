<?php 

App::uses('AppModel', 'Model');

class Material extends AppModel {
    public $name = "Material";
    public $validate = array(
        'category_id' => array(
            'rule' => 'notEmpty'
        ),
        'filename' => array(
            'rule' => 'notEmpty'
        ),
        'name' => array(
            'rule' => 'notEmpty'
        ),
        'filetype_id' => array(
            'rule' => 'notEmpty'
        )
    );

    public $belongsTo = array(
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id'
        ),
        'Filetype' => array(
            'className' => 'Filetype',
            'foreignKey' => 'category_id'
        )
    );



    public function filter($cid, $fid) {
        return $this->find('all', array(
            "conditions" => array(
                "AND" => array(
                    "category_id" => $cid,
                    "filetype_id" => $fid
                )
            )
        ));
    }

    public function byCategory($cid = '') {
        return $this->find('all', array('conditions' => array('category_id' => $cid)));
    }

    public function byFiletype($fif = '') {
        return $this->find('all', array('conditions' => array('filetype_id' => $fid)));
    }
}

?>