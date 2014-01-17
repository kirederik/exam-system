<?php 

class DisciplinesController extends AppController {

    public $components = array('RequestHandler');

    public function index() {
        $disciplines = $this->Discipline->find('all', array('order' => 'ordem'));
        $this->set(array(
            'disciplines' => $disciplines,
            '_serialize' => array('disciplines')
        ));
    }

    public function view($id) {
        $discipline = $this->Discipline->findById($id);
        $this->set(array(
            'discipline' => $discipline,
            '_serialize' => array('discipline')
        ));
    }

    /* Função para adicionar uma nova disciplina */
    public function add() {
        if ($this->request->is('post')) {
            $this->Discipline->create();
            if ($this->Discipline->saveAll($this->request->data)) {
                $this->Session->setFlash('Disciplina cadastrada com sucesso.', 'flash');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Ops, ocorreu um erro ao cadastrar esta disciplina.', 'flash', array('alert' => 'danger'));
            }
        } else {
            $categories = $this->Discipline->Category->find('list');            
            $this->set(compact('categories'));
        }
    }

    public function edit($id) {
        $discipline = $this->Discipline->findById($id);
        if (!$discipline) {
            $this->Session->setFlash('Disciplina não encontrada', 'flash', array('alert' => 'danger'));
            $this->redirect(array('action' => 'index'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            echo var_dump($this->request->data);
            $this->Discipline->id = $id;
            if ($this->Discipline->saveAll($this->request->data)) {
                $this->Session->setFlash('Disciplina atualizada com sucesso', 'flash');
                $message = 'Saved';
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Ops, ocorreu um erro ao atualizar esta disciplina.', 'flash', array('alert' => 'danger'));
                $message = 'Error';
            }
            $this->set(array(
                'message' => $message,
                '_serialize' => array('message')
            ));
        }

        if (!$this->request->data) {
            $this->request->data = $discipline;
        }
        $categories = $this->Discipline->Category->find('list');            
        $this->set(compact('categories'));
    }

    public function delete($id) {
        if ($this->Discipline->delete($id)) {
            $message = 'Deleted';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
        $this->Session->setFlash('Disciplina foi deletada com sucesso', 'flash');
        $this->redirect(array('action' => 'index'));
    }
}

?>