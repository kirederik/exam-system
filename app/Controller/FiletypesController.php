<?php
App::uses('AppController', 'Controller');
/**
 * Materials Controller
 *
 * @property Materials $Materials
 * @property PaginatorComponent $Paginator
 */
class FiletypesController extends AppController {
  
  public function beforeFilter() {
    parent::beforeFilter();
  }

  public function isAuthorized($user) {
    return parent::isAuthorized($user);
  }
  
  public function index() {
  
  }


  public function add() {
    if ($this->request->is('post')) {
      $this->Filetype->create();
      if ($this->Filetype->save($this->request->data)) {
        $this->Session->setFlash('Tipo cadastrado com sucesso.', 'flash');
        $this->redirect(array('action' => 'lista', 'controller' => 'Materials'));
      } else {
        $this->Session->setFlash('Ops, ocorreu um erro ao cadastrar este tipo de material.', 'flash', array('alert' => 'danger'));
      }
    }
  }

}