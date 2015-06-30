<?php
App::uses('AppController', 'Controller');
/**
 * Exams Controller
 *
 * @property Exam $Exam
 * @property PaginatorComponent $Paginator
 */
class ModulesController extends AppController {
  
  public function beforeFilter() {
    parent::beforeFilter();
    // check and update login time
  }
  
  public function index() {
  
  }
}