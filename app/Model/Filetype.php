<?php 

App::uses('AppModel', 'Model');

class Filetype extends AppModel {
    public $name = "Filetype";
    
    public $validate = array(
        'name' => array(
            'rule' => 'notEmpty'
        ),
    );

    public  $hasMany = array(
        'Material'
    );

}

?>