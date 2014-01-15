<?php
App::uses('AppController', 'Controller');
/**
 * Exercises Controller
 *
 * @property Exercise $Exercise
 * @property PaginatorComponent $Paginator
 */
class ExercisesController extends AppController {

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
	public function index() {
		$this->Exercise->recursive = 0;
		$this->set('exercises', $this->Paginator->paginate());
	}

	public function exercises() {
		$this->set('exercises', $this->Exercise->find('all'));
	}

	public function do_exercises($id = null) {
		$this->loadModel('Question');
		$this->loadModel('Discipline');

		if (!$this->Exercise->exists($id)) {
			throw new NotFoundException(__('Invalid test'));
		}
		$exam = $this->Exercise->findById($id);

		$questions = array();
		foreach ($exercise['ExamsDiscipline'] as $discipline) {
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

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Exercise->exists($id)) {
			throw new NotFoundException(__('Invalid exercise'));
		}
		$options = array('conditions' => array('Exercise.' . $this->Exercise->primaryKey => $id));
		$this->set('exercise', $this->Exercise->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Exercise->create();
			$this->request->data["Exercise"]["first_question_id"] = $this->request->data["Exercise"]["question"];
			// $this->Exercise->first_question_id = $this->request->data->question;
			if ($this->Exercise->save($this->request->data)) {
				$this->Session->setFlash('Exercício adicionado com sucesso.', 'flash');
				return $this->redirect(array('action' => 'index'));
			} else {
                $this->Session->setFlash('Ops, ocorreu um erro ao cadastrar este exercício.', 'flash', array('alert' => 'danger'));

			}
		}
		$disciplines = $this->Exercise->Discipline->find('list');
		$questions = $this->Exercise->Discipline->Question->find('list');
		$this->set(compact('disciplines'));
		$this->set(compact('questions'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Exercise->exists($id)) {
            $this->Session->setFlash('Exercício não encontrado', 'flash', array('alert' => 'danger'));
            $this->redirect(array('action' => 'index'));
        }

		if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data["Exercise"]["first_question_id"] = $this->request->data["Exercise"]["question"];
            $this->Exercise->id = $id;
			if ($this->Exercise->save($this->request->data)) {
				$this->Session->setFlash('Exercício editado com sucesso.', 'flash');
				return $this->redirect(array('action' => 'index'));
			} else {
                $this->Session->setFlash('Ops, ocorreu um erro ao salvar este exercício.', 'flash', array('alert' => 'danger'));
			}
		} else {
			$options = array('conditions' => array('Exercise.' . $this->Exercise->primaryKey => $id));
			$this->request->data = $this->Exercise->find('first', $options);
			$this->request->data["Exercise"]["question"] = $this->request->data["Exercise"]["first_question_id"];

		}
		$disciplines = $this->Exercise->Discipline->find('list');
		$this->set(compact('disciplines'));
		$questions = $this->Exercise->Discipline->Question->find('list');
		$this->set(compact('questions'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Exercise->id = $id;
		if (!$this->Exercise->exists()) {
            $this->Session->setFlash('Exercício não encontrado', 'flash', array('alert' => 'danger'));
            $this->redirect(array('action' => 'index'));
        }
		// $this->request->onlyAllow('post', 'delete');
		if ($this->Exercise->delete()) {
			$this->Session->setFlash('Exercício deletado com sucesso.', 'flash');
		} else {
            $this->Session->setFlash('Ops, ocorreu um erro ao deletar este exercício.', 'flash', array('alert' => 'danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
