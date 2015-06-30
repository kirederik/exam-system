<?php 

App::uses('AppModel', 'Model');

class DemosQuestion extends AppModel {
    public $belongsTo = array(
        'Demo', 'Question'
    );
}

?>