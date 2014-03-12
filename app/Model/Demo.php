<?php 

App::uses('AppModel', 'Model');

class Demo extends AppModel {
    public $name = "Demo";

    public $belongsTo = array(
        'Category' => array(
        	'className' => 'Category',
            'foreignKey' => 'category_id'
        ),

    );

    public $hasMany = array(
        'DemosQuestion' => array(
            'className' => 'DemosQuestion',
            'dependent' => true
        )
    );
}

?>