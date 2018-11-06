<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
		
		$this->loadComponent('Joinme');
		$this->set('join_me_authorize_link', $this->Joinme->jmAuthorizeLink());
		
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$user = $this->Users->newEntity();
        if ($this->request->is('ajax')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
			
			//as requested to save usename value as email
			$user = $this->Users->patchEntity($user, ['username' => $this->request->getData('email')]);
			
            if ($this->Users->save($user)) {
				$this->_jsonOut(['ok' => 1]); exit;
				
                $tz = 'America/Toronto';
                $timestamp = time();
                $dt = new \DateTime("now", new \DateTimeZone($tz)); //first argument "must" be a string
                $dt->setTimestamp($timestamp); //adjust the object to correct timestamp
                $dateTime = $dt->format('Y-m-d H:i:s');

                $totalPreRegisters = $this->Users->find()->count();
                $to = ['toussi@gmail.com','haghparast@gmail.com'];
                
                $subject = 'Total pre-registers: ' . $totalPreRegisters;
                $body = "A new user has pre-registered on Holoflix: <br />";
                $body .= "<b>First Name:</b> " . $this->request->getData('first_name') . "<br />";
                $body .= "<b>Last Name:</b> " . $this->request->getData('last_name') . "<br />";
                $body .= "<b>Email:</b> " . $this->request->getData('email') . "<br />";
                $body .= "<b>date/time:</b> " . $dateTime . " (Toronto time)<br />";
                $this->_sendMail($to, $subject, $body);
                $this->_jsonOut(['ok' => 1]);

            } else {
                $this->_jsonOut(['ok' => 0]);
            }
			exit;
        }
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
			
			//as requested to save usename value as email
			$user = $this->Users->patchEntity($user, ['username' => $this->request->getData('email')]);
			
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                if ($this->request->getData('home') == 1) {
                    return $this->redirect(['controller' => 'Holoflix', 'action' => 'display', 'home']);
                }
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function checkEmail($return = false)
    {
        $this->autoRender = false;
        $email = $this->request->getData('email');
        $user = $this->Users->find()
            ->where(['email' => $email])
            ->first();
        if (empty($user)) {
            $output = ['valid' => true];
        } else {
            $output = ['valid' => false];
        }
        if ($return) {
            return $output;
        }
        $this->_jsonOut($output);
        exit;
    }
	
	public function getAccess()
    {
		$this->loadComponent('Joinme');
		
		if(isset($this->request->query['code']) && $this->request->query['code'] != '') 
		{
			$result = $this->Joinme->jmGetAccess($this->request->query['code']);
		
			if(!empty($result) && isset($result->access_token)) {
				//save in session for now. Later need to store in database
				$session = $this->request->session();
				$session->write('access_token', $result->access_token);
				$session->write('refresh_token', $result->refresh_token);
				
				return $this->redirect(['controller' => 'Schedulemeetings', 'action' => 'index']);
			}else{
				$this->Flash->error(__('Unable to generate access token. Please try again.'));
				return $this->redirect(['action' => 'index']);
			}
		}else{
			$this->Flash->error(__('Unable to generate access token. Please try again.'));
			return $this->redirect(['action' => 'index']);
		}
		exit;
    }
	
}
