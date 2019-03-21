<?php
App::uses('AppController', 'Controller');
/**
 * Surveys Controller
 */
class SurveysController extends AppController
{

/**
 * Scaffold
 *
 * @var mixed
 */
    // public $scaffold;

    public $components = array('Paginator');

    public function index()
    {
		//check user logged in
        if (!$this->Auth->user()) {
            return $this->redirect(array('controller' => 'users', 'action' => 'login'));
        }

        $this->Survey->recursive = 0;
        $this->set('surveys', $this->Paginator->paginate());
    }

    public function add()
    {
        //check user type admin
        if (!in_array($this->Auth->user('type'), ['admin', 'root'])) {
            return $this->redirect(array('action' => 'index'));
        }

        if ($this->request->is('post')) {

            $this->User->create();

            // pr($this->request->data);
            // return;

            //hash password
            $this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);

            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
    }
}
