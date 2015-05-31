<?php
App::uses('AppController', 'Controller');
/**
 * Exams Controller
 *
 * @property Exam $Exam
 * @property PaginatorComponent $Paginator
 */
class ExamsController extends AppController {

/**
 * Components
 *
 * @var array
 */
public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
<<<<<<< HEAD
public function beforeFilter() {
	parent::beforeFilter();
  // check and update login time
}

public function isAuthorized($user) {
	if ($this->action === 'exams' || $this->action ==="do_exam" || $this->action ==="do_exercise" ) {
		if (parent::isExpired($user)) {
			parent::isAuthorized($user);
		} else {
			return true;
		}
	}
	return parent::isAuthorized($user);
}
=======
    public function beforeFilter() {
        parent::beforeFilter();
        // check and update login time
    }

		public function isAuthorized($user) {
	    if ($this->action === 'exams' || $this->action ==="do_exam" || $this->action ==="do_exercise" ) {
	      if ((int) $user['expiracao'] < time()) {
	        parent::isAuthorized($user);
	      } else {
	      	return true;
	      }
	    }
	    return parent::isAuthorized($user);
		}
>>>>>>> 9730f6a3e63d5204d10d8cf4985dee4b73959ca4

public function index() {
	$this->Exam->recursive = 0;
		// $this->set('exams', $this->Paginator->paginate());
	$this->set('exams', $this->Exam->find('all'));
}

public function exams() {
	$this->loadModel('Discipline');
	$category = $this->Auth->user('category_id');
	if ($this->Auth->user('role') == 'admin') {
		$exams = $this->Exam->find('all');
		$disciplines = $this->Discipline->find('all', array('order' => 'ordem'));
	} else {
		$exams = $this->Exam->find('all',
			array('conditions' => array('Exam.category_id' => $category))
			);
		$disciplines = $this->Discipline->find('all'
			, array(
				'order' => 'Discipline.ordem'
				, 'joins' => array(
					array(
						'table' => 'disciplines_categories',
						'alias' => 'DisciplinesCategories',
						'type' => 'INNER',
						'conditions' => array(
							'DisciplinesCategories.discipline_id = Discipline.id'
							)
						)
					),
				'conditions' => array('DisciplinesCategories.category_id' => $category)
				)
			);
	}
	$this->set('exams', $exams);
	$this->set('disciplines', $disciplines);
}

public function do_exam($id = null) {
	$this->loadModel('Question');
	$this->loadModel('Discipline');

	if (!$this->Exam->exists($id)) {
		throw new NotFoundException(__('Invalid test'));
	}
	$exam = $this->Exam->findById($id);

	$questions = array();
	foreach ($exam['ExamsDiscipline'] as $discipline) {
		if ($discipline['amount'] > 0) {
			$questions = array_merge($questions,
				$this->Question->find('all',
					array(
						'conditions' => array('Question.discipline_id' => $discipline["discipline_id"]),
						'limit' => $discipline['amount'],
						'order' => 'RAND()'
						)
					)
				);
		}
	}

	$this->set('exam', $exam);
	$this->set('questions', $questions);
}

public function do_exercise($discipline = null, $offset = null) {
	$this->loadModel('Question');
	$this->loadModel('Discipline');

	if (!$this->Discipline->exists($discipline)) {
		throw new NotFoundException(__('Invalid discipline'));
	}
	$questions = $this->Question->find('all',
		array(
			'conditions' => array('Question.discipline_id' => $discipline),
			'limit' => 25,
			'offset' => 25 * ($offset - 1),
			'order' => 'Question.id'
			)
		);
	$this->set('questions', $questions);
	$this->set('number', $offset);
}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function view($id = null) {
	if (!$this->Exam->exists($id)) {
		throw new NotFoundException(__('Invalid test'));
	}
	$exam = $this->Exam->findById($id);
	$query = "select * from disciplines where";
	foreach ($exam["ExamsDiscipline"] as $discipline) {
		$query .= " id = ". $discipline["discipline_id"] . ' or ';
	}
		$query .= 'id = NULL;'; // Never happens
		$this->set('disciplines', $this->Exam->query($query));
		$this->set('exam', $exam);
	}

/**
 * add method
 *
 * @return void
 */
public function add() {

	if ($this->request->is('post')) {
		$this->Exam->create();
		if ($this->Exam->saveAssociated($this->request->data)) {
			$this->Session->setFlash('Simulado adicionado com sucesso.', 'flash');
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash('Ops, ocorreu um erro ao cadastrar este simulado.', 'flash', array('alert' => 'danger'));
		}
	}
	$categories = $this->Exam->Category->find('list');
	$disciplines = $this->Exam->query('select * from disciplines;');
	$this->set(compact('categories'));
	$this->set(compact('disciplines'));
}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function edit($id = null) {
	if (!$this->Exam->exists($id)) {
		$this->Session->setFlash('Simulado não encontrado', 'flash', array('alert' => 'danger'));
		$this->redirect(array('action' => 'index'));
	}

	if ($this->request->is('post') || $this->request->is('put')) {
		$this->Exam->id = $id;
		if ($this->Exam->saveAssociated($this->request->data)) {
			$this->Session->setFlash('Simulado editado com sucesso.', 'flash');
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash('Ops, ocorreu um erro ao salvar este simulado.', 'flash', array('alert' => 'danger'));
		}
	} else {
		$options = array('conditions' => array('Exam.' . $this->Exam->primaryKey => $id));
		$this->request->data = $this->Exam->find('first', $options);
	}
	$categories = $this->Exam->Category->find('list');
	$exam = $this->Exam->findById($id);
	$query = "select * from disciplines where";
	foreach ($exam["ExamsDiscipline"] as $discipline) {
		$query .= " id = ". $discipline["discipline_id"] . ' or ';
	}
		$query .= 'id = NULL;'; // Never happens
		$this->set('disciplines', $this->Exam->query($query));
		$this->set('exam', $exam);
		$this->set(compact('categories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function delete($id = null) {
	$this->Exam->id = $id;
	if (!$this->Exam->exists()) {
		$this->Session->setFlash('Simulado não encontrado', 'flash', array('alert' => 'danger'));
		$this->redirect(array('action' => 'index'));
	}
		// $this->request->onlyAllow('post', 'delete');
	if ($this->Exam->delete()) {
		$this->Session->setFlash('Simulado deletado com sucesso.', 'flash');
	} else {
		$this->Session->setFlash('Ops, ocorreu um erro ao deletar este simulado.', 'flash', array('alert' => 'danger'));
	}
	return $this->redirect(array('action' => 'index'));
}}
