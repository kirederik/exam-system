<?php 
App::uses('AppController', 'Controller');

class DemosController extends AppController {
  public $components = array();

  public function beforeFilter() {
    parent::beforeFilter();

    $this->Auth->allow('viewDemos', 'viewDemo');
  }

  public function index() {
    $this->set('demos', $this->Demo->find('all'));
  }
  public function viewDemos() {
    $this->set('demos', $this->Demo->find('all'));
  }
  public function edit($id = null) {
    if (!$this->Demo->exists($id)) {
            $this->Session->setFlash('Demonstração não encontrada', 'flash', array('alert' => 'danger'));
            $this->redirect(array('action' => 'index'));
        }

    if ($this->request->is('post') || $this->request->is('put')) {
      $this->Demo->id = $id;
      if ($this->Demo->saveAssociated($this->request->data)) {
        $this->Session->setFlash('Simulado editado com sucesso.', 'flash');
        return $this->redirect(array('action' => 'index'));
      } else {
                $this->Session->setFlash('Ops, ocorreu um erro ao salvar este simulado.', 'flash', array('alert' => 'danger'));
      }
    } else {
      $options = array('conditions' => array('Demo.' . $this->Demo->primaryKey => $id));
      $this->request->data = $this->Demo->find('first', $options);
    }
    $categories = $this->Demo->Category->find('list');
    $demo = $this->Demo->findById($id);
    $this->set('demo', $demo);
    $this->set(compact('categories'));
  }

  public function add() {
    if ($this->request->is('post')) {
      $this->Demo->create();
      if ($this->Demo->saveAssociated($this->request->data)) {
        $this->Session->setFlash('Demostração adicionada com sucesso', 'flash');
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash('Ops, ocorreu um erro ao cadastrar esta demonstração.', 'flash', array('alert' => 'danger'));
      }
    } else {
      $categories = $this->Demo->Category->find('list');
      $this->set(compact('categories'));
    }
  }

  public function view($id = null) {
    $this->loadModel('Question');
    if (!$this->Demo->exists($id)) {
      throw new NotFoundException(__("Demonstração não encontrada"));
    }
    $demo = $this->Demo->findById($id);
    $questions = $this->Demo->DemosQuestion->find('all', array('conditions' => array('DemosQuestion.demo_id = ' . $id)));
    $this->set('demo', $demo);
    $this->set('questions', $questions);
  }

  public function viewDemo($id = null) {
    $this->loadModel('Question');
    $this->loadModel('Alternative');
    if (!$this->Demo->exists($id)) {
      throw new NotFoundException(__("Demonstração não encontrada"));
    }
    $demo = $this->Demo->findById($id);
    $dqs = $this->Demo->DemosQuestion->find('all', array('conditions' => array('DemosQuestion.demo_id = ' . $id)));
    $questions = array();
    foreach ($dqs as $index => $dq) {
      $questions = array_merge($questions, $this->Question->find('all', 
          array(
            'conditions' => array('Question.id' => $dq['Question']['id'])
          )
        )
      );
    }
    $this->set('demo', $demo);
    $this->set('questions', $questions);
    // $this->set('alternatives', $alternatives);
  }

  public function delete($id = null) {
    $this->Demo->id = $id;
    if (!$this->Demo->exists()) {
            $this->Session->setFlash('Demonstração não encontrada', 'flash', array('alert' => 'danger'));
            $this->redirect(array('action' => 'index'));
        }
    // $this->request->onlyAllow('post', 'delete');
    if ($this->Demo->delete()) {
      $this->Session->setFlash('Demonstração deletada com sucesso.', 'flash');
    } else {
      $this->Session->setFlash('Ops, ocorreu um erro ao deletar esta demonstração.', 'flash', array('alert' => 'danger'));
    }
    return $this->redirect(array('action' => 'index'));
  }
}

 ?>