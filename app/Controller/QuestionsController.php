<?php 

class QuestionsController extends AppController {

    public $components = array('RequestHandler', 'Paginator');

    public $paginate = array(
        'limit' => 25,
        'order' => array(
            'Question.id' => 'asc'
        )
    );

    public function index() {
        $this->Paginator->settings = $this->paginate;

        if ($this->request->is('post')) {
            $this->set('nopage', true);
            $questions = $this->Question->textLike($this->request->data['Question']['question_text']);
        } else {
            $this->set('nopage', false);
            $questions = $this->Paginator->paginate('Question');
            // $questions = $this->Question->find('all', array("limit" => 10));
        }
        $this->set(array(
            'questions' => $questions,
            '_serialize' => array('questions')
        ));
    }

    public function byDiscipline($discipline = null) {
        $questions = $this->Question->byDiscipline($discipline);
        $this->set(array(
            'questions' => $questions,
            '_serialize' => array('questions')
        ));
    }

    public function view($id) {
        $question = $this->Question->findById($id);
        $this->set(array(
            'question' => $question,
            '_serialize' => array('question')
        ));
    }

    /* Função para adicionar uma nova questão */
    public function add() {
        if ($this->request->is('post')) {
            $this->Question->create();
            unset($this->Question->Alternative->validate['company_id']);
            if ($this->Question->saveAssociated($this->request->data)) {
                $this->Session->setFlash('Questão cadastrada com sucesso.', 'flash');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Ops, ocorreu um erro ao cadastrar esta questão.', 'flash', array('alert' => 'danger'));
            }
        } else {
            $disciplines = $this->Question->Discipline->find('list');
            $this->set('alternatives', $this->Question->Alternative->find('list'));
            $this->set(compact('disciplines'));

        }
    }

    public function edit($id) {
        $question = $this->Question->findById($id);
        if (!$question) {
            $this->Session->setFlash('Questão não encontrada', 'flash', array('alert' => 'danger'));
            $this->redirect(array('action' => 'index'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Question->id = $id;
            //if ($this->Question->save($this->request->data)) {
            unset($this->Question->Alternative->validate['company_id']);
            if ($this->Question->saveAssociated($this->request->data)) {
                $this->Session->setFlash('Questão atualizada com sucesso', 'flash');
                $message = 'Saved';
                $this->redirect(array('action' => 'view', $id));
            } else {
                $this->Session->setFlash('Ops, ocorreu um erro ao atualizar esta questão.', 'flash', array('alert' => 'danger'));
                $message = 'Error';
            }
            $this->set(array(
                'message' => $message,
                '_serialize' => array('message')
            ));
        } else {
            $disciplines = $this->Question->Discipline->find('list');
            $this->set(compact('disciplines'));

        }

        if (!$this->request->data) {
            $this->request->data = $question;
        }
    }

    public function delete($id) {
        if ($this->Question->delete($id, true)) {
            $message = 'Deleted';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
        $this->Session->setFlash('Questão deletada com sucesso', 'flash');
        $this->redirect(array('action' => 'index'));
    }
}

?>