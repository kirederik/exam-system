<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController {

    // public function beforeFilter() {
    //     parent::beforeFilter();
    //     $this->Auth->allow('add', 'logout');
    // }

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('logout', 'login');
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $lt =  $this->Auth->user('logged_time');
                if ((int)  $this->Auth->user('logged') == 1 &&
                    (time() - $lt) / 60 < 30) {
                    $this->Session->setFlash('Usuário já logado. Este evento será reportado', 'flash',
                        array('alert' => 'danger'));
                    $this->redirect($this->Auth->logout());
                }
                $this->request->data['User']['logged'] = 1;
                $this->request->data['User']['logged_time'] = time();
                $this->request->data['User']['id'] = $this->Auth->user('id');
                $this->User->save($this->request->data);
                return $this->redirect($this->Auth->redirect());
            }
            else {
                $this->Session->setFlash('Usuário ou senha inválidos. Tente novamente.', 'flash', array('alert' => 'danger'));
                unset($this->request->data['User']['password']);
            }
        }
    }

    public function logout() {
        $this->request->data['User']['logged'] = 0;
        $this->request->data['User']['id'] = $this->Auth->user('id');
        $this->User->save($this->request->data);
        return $this->redirect($this->Auth->logout());
    }

    public function logout_user($id = null) {
        $this->User->id = $id;
        $this->User->logged = 0;
        $this->User->save($this);
        $this->Session->setFlash('Usuário deslogado.', 'flash');
        $this->redirect(array("action" => "loggedin"));

    }

    public function index() {
        if($this->request->is('post')) {
            $user = $this->User->nameLike($this->request->data['User']['username']);
            $this->redirect(array('action' => 'edit' , $user['User']['id']));
        } else {
            $this->set('users', $this->User->find('all', array('limit' => 25)));
        }
    }

    public function loggedin() {
        if ($this->request->is('post')) {
            # logout user
        } else {
            $this->set('users', $this->User->logged());
        }
    }


    public function expired() {
        if($this->request->is('post')) {
            $user = $this->User->expiredUser($this->request->data['User']['username']);
            if(!$user) {
                $this->Session->setFlash('Usuário não encontrado', 'flash', array('alert' => 'danger'));
                $this->set('users', $this->User->expired());
            } else {
                $this->set('users', array($user));
            }
        } elseif ($this->request->is('put')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('Usuário editado com sucesso.', 'flash');
                $this->redirect(array('action' => 'index'));
            }
        } else {
            $this->set('users', $this->User->expired());
        }
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário inválido'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            if ($this->request->data['User']['password'] !=
                $this->request->data['User']['conf_password']) {
                $this->Session->setFlash('Senhas não conferem.', 'flash', array('alert' => 'danger'));
            } else {
                $this->User->create();
                if ($this->User->findByExemplar($this->request->data['User']['exemplar'])) {
                    $this->Session->setFlash('Exemplar já cadastrado.', 'flash', array('alert' => 'danger'));
                } else {
                    if ($this->User->save($this->request->data)) {
                        $this->Session->setFlash('Usuário cadastrado com sucesso.', 'flash');
                        $this->redirect(array('action' => 'index'));
                    } else {
                        $this->Session->setFlash('Usuário não foi cadastrado. Tente novamente.', 'flash', array('alert' => 'danger'));
                    }
                }
            }
        } else {
            $categories = $this->User->Category->find('list');
            $this->set(compact('categories'));
        }
    }

    public function edit($id = null) {
        $user = $this->User->findById($id);
        if (!$user) {
            throw new NotFoundException(__('Usuário inválido'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->request->data['User']['new_password'] != "" ||
                $this->request->data['User']['new_conf_password'] != "") {
                if ($this->request->data['User']['new_conf_password'] == $this->request->data['User']['new_password']) {
                    $this->request->data['User']['password'] = $this->request->data['User']['new_password'];
                } else {
                    $this->Session->setFlash('Senhas não conferem.', 'flash', array('alert' => 'danger'));
                    return;
                }
            }
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('Usuário editado com sucesso.', 'flash');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Usuário não foi editado. Tente novamente.', 'flash', array('alert' => 'danger'));
            }
        } else {
            unset($this->request->data['User']['password']);
            $this->request->data = $user;
            $categories = $this->User->Category->find('list');
            $this->set(compact('categories'));
        }
    }

    public function delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash('Usuário deletado com sucesso.', 'flash');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Usuário não foi deletado. Tente novamente.', 'flash', array('alert' => 'danger'));
        $this->redirect(array('action' => 'index'));
    }
}
?>