<?php 
// src/Controller/JobsController.php

namespace App\Controller;


use Cake\Mailer\Email;

class JobsController extends AppController
{

    public function index()
    {
        $jobs = $this->Jobs->find('all');
        $this->set(compact('jobs'));
    }

    public function view($id = null)
    {
        $job = $this->Jobs->get($id);
        $this->set(compact('job'));
    }

     public function add()
    {
        $job = $this->Jobs->newEntity();
        if ($this->request->is('post')) {
            $job = $this->Jobs->patchEntity($job, $this->request->getData());
            $job->token = \Token\Token::generate([], "+6 days");
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('Ihr Job wurder gespeichert.'));
              
	    		
		        $configuration_link = "http://" . $_SERVER['HTTP_HOST'] .  $this->request->webroot . "jobs/edit/".$this->Jobs->save($job)->id."?token=".$job->token;
		        $message = 'Hallo, dein Konfiguartions Link für deinen Job ist ';
		        
		        $email = new Email();
		        $email->transport('gmail');
		        $email->from('felixvonhaaren@gmail.com');
		        $email->to("felixvonhaaren@web.de");
		        $email->subject('Job erstellt - Konfiguration');
		        $email->send($message . " " . $configuration_link);
	                return $this->redirect(['action' => 'index']);
	            }
            $this->Flash->error(__('Ihr Job konnte nicht gespeichert werden.'));
        }

        $this->set('job', $job);
		
    }

    public function edit($id = null)
	{
	    $job = $this->Jobs->get($id);
	    $tokenURL = $this->request->getQuery('token');
	    $tokenDB = $job->token;
	    if( $tokenURL !== $tokenDB){
	    	$this->Flash->error(__('Falscher Token !'));
	    	return $this->redirect(['action' => 'view', $job->id]);
	    }

	    if ($this->request->is(['post', 'put'])) {
	        $this->Jobs->patchEntity($job, $this->request->getData());
	        
	        if ($this->Jobs->save($job)) {
	            $this->Flash->success(__('Ihr Job wurde aktualisiert.'));
	            return $this->redirect(['action' => 'index']);
	        }
	        $this->Flash->error(__('Ihr Job konnte nicht aktualisiert werden.'));
	    }	
	    

	    $this->set('job', $job);

	}

	public function delete($id)
	{
	    $this->request->allowMethod(['post', 'delete']);

	    $job = $this->Jobs->get($id);
	    if ($this->Jobs->delete($job)) {
	        $this->Flash->success(__('Der Job {0} wurde gelöscht.', h($job->jobname)));
	        return $this->redirect(['action' => 'index']);
	    }
	}

}

?>