<?php
App::uses('AppController', 'Controller');
/**
 * Materials Controller
 *
 * @property Materials $Materials
 * @property PaginatorComponent $Paginator
 */
class MaterialsController extends AppController {
  
  public function beforeFilter() {
    parent::beforeFilter();
  }


  public function isAuthorized($user) {
    if ($this->action === 'index') {
      if (parent::isExpired($user)) {
        parent::isAuthorized($user);
      } else {
        return true;
      }
    }
    return parent::isAuthorized($user);
  }
  
  public function index() {
  
  }

  public function add() {
    if ($this->request->is('post')) {
      $this->Material->create();
      if ($this->Material->save($this->request->data)) {
        $this->Session->setFlash('Material cadastrado com sucesso.', 'flash');
        $this->redirect(array('action' => 'lista'));
      } else {
        $this->Session->setFlash('Ops, ocorreu um erro ao cadastrar este material.', 'flash', array('alert' => 'danger'));
      }
    }

    $filetypes = $this->Material->Filetype->find('list');
    $categories = $this->Material->Category->find('list');            
    $this->set(compact('categories'));
    $this->set(compact('filetypes'));
  }

  public function lista() {
    $this->Material->recursive = 0;
      // $this->set('exams', $this->Paginator->paginate());
    $this->set('materials', $this->Material->find('all'));
  }

  public function download($filename) {
    $this->viewClass = 'Media';
    // Download app/outside_webroot_dir/example.zip
    $params = array(
      'id'        => $filename . '.pdf',
      'name'      => $filename,
      'download'  => false,
      'extension' => 'pdf',
      'path'      => APP . 'files' . DS
    );
    $this->set($params);
  }
}