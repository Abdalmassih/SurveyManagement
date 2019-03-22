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

            $this->Survey->create();

            // pr($this->request->data);
            // return;

            if ($this->Survey->save($this->request->data)) {

                if ($this->RequestHandler->isAjax()) {
                    $this->render('success', 'ajax');
                } else {

                    $this->Flash->success(__('The survey has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Flash->error(__('The survey could not be saved. Please, try again.'));
            }
        }
    }

    public function validateForm()
    {
        if ($this->RequestHandler->isAjax()) {
			// pr($this->request->data);
			$this->request->data['Survey'][$this->params['data']['field']] = $this->params['data']['value'];
            $this->Survey->set($this->request->data);
            if ($this->Survey->validates()) {
				$this->autoRender = false;
            } else {
				$error = $this->validateErrors($this->Survey);
				// pr($error['title']);
                $this->set('error', $error[$this->params['data']['field']][0]);
            }
        }
    }
}
