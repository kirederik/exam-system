<?php 

class CategoriesController extends AppController {

    public $components = array('RequestHandler');

    public function index() {
        $categories = $this->Category->find('all');
        $this->set(array(
            'categories' => $categories,
            '_serialize' => array('categories')
        ));
    }

    public function view($id) {
        $category = $this->Category->findById($id);
        $this->set(array(
            'category' => $category,
            '_serialize' => array('category')
        ));
    }

    /* Função para adicionar uma nova categoria */
    public function add() {
        if ($this->request->is('post')) {
            $this->Category->create();
            if ($this->Category->save($this->request->data)) {
                $this->Session->setFlash('Categoria cadastrada com sucesso.', 'flash');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Ops, ocorreu um erro ao cadastrar esta categoria.', 'flash', array('alert' => 'danger'));
            }
        }
    }

    public function edit($id) {
        $category = $this->Category->findById($id);
        if (!$category) {
            $this->Session->setFlash('Categoria não encontrada', 'flash', array('alert' => 'danger'));
            $this->redirect(array('action' => 'index'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Category->id = $id;
            if ($this->Category->save($this->request->data)) {
                $this->Session->setFlash('Categoria atualizada com sucesso', 'flash');
                $message = 'Saved';
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Ops, ocorreu um erro ao atualizar esta categoria.', 'flash', array('alert' => 'danger'));
                $message = 'Error';
            }
            $this->set(array(
                'message' => $message,
                '_serialize' => array('message')
            ));
        }

        if (!$this->request->data) {
            $this->request->data = $category;
        }
    }

    public function delete($id) {
        if ($this->Category->delete($id)) {
            $message = 'Deleted';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
        $this->Session->setFlash('Categoria deletada com sucesso', 'flash');
        $this->redirect(array('action' => 'index'));
    }
}

?>