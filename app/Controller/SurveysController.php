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

        if ($this->RequestHandler->isAjax()) {
            $this->autoRender = false;

            $this->Survey->create();
            $this->request->data['user_id'] = $this->Auth->user('id');
            // pr($this->request->data);
            $savedSurvey = $this->Survey->save($this->request->data);
            // pr($savedSurvey);
            if (!empty($savedSurvey)) {
                $question = $this->request->data['questions'];

                $savedQ = $this->Survey->Question->save([
                    'question' => $question['question'],
                    'survey_id' => $this->Survey->id,
                ]);
                if (isset($question['children'][0])) {
                    $this->saveChildQs($question['children'][0], $savedQ['Question']['id']);
                }
                if (isset($question['children'][1])) {
                    $this->saveChildQs($question['children'][1], $savedQ['Question']['id']);
                }

                $this->Flash->success(__('The survey has been saved.'));
                // return $this->redirect(array('action' => 'index'));
                return json_encode(array('survey_id' => $this->Survey->id));

            } else {
                $this->Flash->error(__('The survey could not be saved. Please, try again.'));
            }
        }
    }

    public function view($id = null)
    {
        if (!$this->Survey->exists($id)) {
            throw new NotFoundException(__('Invalid survey'));
        }
        $options = array('conditions' => array('Survey.' . $this->Survey->primaryKey => $id));
        $this->set('survey', $this->Survey->find('first', $options));
    }

    public function saveChildQs($q, $parentQId)
    {
        $this->Survey->Question->create();

        $savedQ = $this->Survey->Question->save([
            'question' => $q['question'],
            'survey_id' => $this->Survey->id,
            'on_yes_no' => $q['type'],
            'parent_q_id' => $parentQId,
        ]);

        if (isset($q['children'][0])) {
            $this->saveChildQs($q['children'][0], $savedQ['Question']['id']);
        }
        if (isset($q['children'][1])) {
            $this->saveChildQs($q['children'][1], $savedQ['Question']['id']);
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
