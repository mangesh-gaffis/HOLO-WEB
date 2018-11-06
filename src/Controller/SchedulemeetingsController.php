<?php
namespace App\Controller;

use App\Controller\AppController;


/**
 * Schedulemeetings Controller
 *
 * @property \App\Model\Table\SchedulemeetingsTable $Schedulemeetings
 *
 * @method \App\Model\Entity\Schedulemeeting[] paginate($object = null, array $settings = [])
 */
class SchedulemeetingsController extends AppController
{

	public function initialize()
	{
		parent::initialize();
		
		$session = $this->request->session();
		$access_token = $session->read('access_token');
		if(empty($access_token)) {
			$this->Flash->error(__('Access token expired or You haven\'t created yet. Please create.'));	
			return $this->redirect(['controller' => 'users', 'action' => 'index']);
		}
	}

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
		$this->loadComponent('Joinme');
		$session = $this->request->session();
		$access_token = $session->read('access_token');
		
		
		$meetings = $this->paginate($this->Schedulemeetings);
		/*
		-- This code is just for example to show how meeting details can be fetch. In actual, developer need to store all these details while creating meeting to avoid sending request to join me API every-time. 
		*/
		if(!empty($meetings)) {
			foreach($meetings as $itemnum => $meeting) {
				$meeting_id = $meeting['meeting_id'];
				
				$result = $this->Joinme->jmGetScheduleMeeting($meeting_id, $access_token);
				if(isset($result->meetingName)) {
				$meeting->meeting_name = $result->meetingName;
				$meeting->meeting_start = $result->meetingStart;
				$meeting->meeting_end = $result->meetingEnd;
				$meeting->participants = $result->participants;
				$meeting->viewerlink = $result->viewerLink;
				}
			}
		}
	
		
        $this->set(compact('meetings'));
        $this->set('_serialize', ['meetings']);
    }

    /**
     * View method
     *
     * @param string|null $id Schedulemeeting id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $schedulemeeting = $this->Schedulemeetings->get($id, [
            'contain' => []
        ]);

        $this->set('schedulemeeting', $schedulemeeting);
        $this->set('_serialize', ['schedulemeeting']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$session = $this->request->session();
		$access_token = $session->read('access_token');
		
		if(empty($access_token)) {
			$this->Flash->error(__('Access token expired or You haven\'t created yet. Please create.'));	
			return $this->redirect(['controller' => 'users', 'action' => 'index']);
		}
	
		$schedulemeeting = $this->Schedulemeetings->newEntity();
       
        if ($this->request->is('post')) {
		
			$post_data = $this->request->getData();
			$meetingdata = array(
				"meetingStart" => date('Y-m-d\TH:i:s\Z', strtotime($post_data['meetingStart'])),
				"meetingEnd" =>  date('Y-m-d\TH:i:s\Z', strtotime($post_data['meetingEnd'])),
				"meetingName" => $post_data['meetingName'], 
			);
			
			$this->loadComponent('Joinme');
			$result = $this->Joinme->jmScheduleMeeting($meetingdata, $access_token);
			
			if(!empty($result) && isset($result->meetingId)) {
				//send mail to support person informing about new meeting scheduled 
				$support_person_email = 'nik02.kamble@gmail.com';
				$subject = 'New Meeting Scheduled: '.$result->meetingId;
				$body = "<p>Hi There,</p>";
				$body .= "<p>New meeting scheduled. Details are as follow:</p>";
				$body .= "<p>Meeting Id: ".$result->meetingId."</p>";
				$body .= "<p>Meeting Name: ".$result->meetingName."</p>";
				$body .= "<p>Meeting Start: ".$result->meetingStart."</p>";
				$body .= "<p>Meeting End: ".$result->meetingEnd."</p>";
				$body .= "<p>Thanks, <br>Support Team</p>";
				$this->Joinme->jmSendMail($support_person_email, $subject, $body);
				//send mail end
							
				$savedata = array('meeting_id' => $result->meetingId, 'user_id' => 1);
				$schedulemeeting = $this->Schedulemeetings->patchEntity($schedulemeeting, $savedata);	
				if ($this->Schedulemeetings->save($schedulemeeting)) {
					$this->Flash->success(__('Meeting has been saved.'));
					return $this->redirect(['action' => 'index']);
				}
			}
			$this->Flash->error(__('Meeting could not be saved. Please, try again.'));
        }
        $this->set(compact('schedulemeeting'));
        $this->set('_serialize', ['schedulemeeting']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Schedulemeeting id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $schedulemeeting = $this->Schedulemeetings->get($id);
        if ($this->Schedulemeetings->delete($schedulemeeting)) {
            $this->Flash->success(__('Meeting has been deleted.'));
        } else {
            $this->Flash->error(__('Meeting could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
}
