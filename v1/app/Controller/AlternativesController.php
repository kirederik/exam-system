<?php 

class AlternativesController extends AppController {

    public $components = array('RequestHandler');

    public function index() {
        $alternatives = $this->Alternatives->find('all');
        $this->set(array(
            'alternatives' => $alternatives,
            '_serialize' => array('alternatives')
        ));
    }


    /* Função para adicionar uma nova alternativa */
    public function add() {
        if ($this->request->is('post')) {
            $this->Alternative->create();
            $this->Alternative->save($this->request->data)
        }
    }

    // public function edit($id) {
    //     $question = $this->Question->findById($id);
    //     if (!$question) {
    //         $this->Session->setFlash('Questão não encontrada', 'flash', array('alert' => 'danger'));
    //         $this->redirect(array('action' => 'index'));
    //     }

    //     if ($this->request->is('post') || $this->request->is('put')) {
    //         $this->Question->id = $id;
    //         if ($this->Question->save($this->request->data)) {
    //             $this->Session->setFlash('Questão atualizada com sucesso', 'flash');
    //             $message = 'Saved';
    //             $this->redirect(array('action' => 'index'));
    //         } else {
    //             $this->Session->setFlash('Ops, ocorreu um erro ao atualizar esta questão.', 'flash', array('alert' => 'danger'));
    //             $message = 'Error';
    //         }
    //         $this->set(array(
    //             'message' => $message,
    //             '_serialize' => array('message')
    //         ));
    //     } else {
    //         $disciplines = $this->Question->Discipline->find('list');
    //         $this->set(compact('disciplines'));

    //     }

    //     if (!$this->request->data) {
    //         $this->request->data = $question;
    //     }
    // }

    // public function delete($id) {
    //     if ($this->Question->delete($id)) {
    //         $message = 'Deleted';
    //     } else {
    //         $message = 'Error';
    //     }
    //     $this->set(array(
    //         'message' => $message,
    //         '_serialize' => array('message')
    //     ));
    //     $this->Session->setFlash('Questão deletada com sucesso', 'flash');
    //     $this->redirect(array('action' => 'index'));
    // }
}

?>