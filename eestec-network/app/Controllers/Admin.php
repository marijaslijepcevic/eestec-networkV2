<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\eventModel;

class Admin extends Controller
{
     protected function prikaz($stranica,$data){
        //$data['controller'] = 'Admin';
        echo view($stranica, $data);    
    }
    
    public function index(){
        $committeeModel = new \App\Models\committeeModel();
        $committees = $committeeModel->where("isApproved", 0)->findAll();
       // $this->session->set('committees', $committees);
        $this->prikaz("adminAcceptCommittees", ['committees' => $committees]);  
    }
  
      
    public function acceptEvents(){
        $eventModel = new \App\Models\eventModel();
        $events = $eventModel->where("isApproved", 0)->findAll();
        $this->prikaz("adminAcceptEvents", ['events' => $events]);      
    }
    
    public function deleteEvents(){
        //TO DO...
    }
    
    public function acceptCommittees(){
        $committeeModel = new \App\Models\committeeModel();
        $committees = $committeeModel->where("isApproved", 0)->findAll();
        //$this->session->set('committees', $committees);
        $this->prikaz("adminAcceptCommittees", ['committees' => $committees]);  
    }
    
    public function clickAcceptCommittee(){
        
    }
    
    public function clickDeclineCommittee(){
        
    }
    
    public function clickReadMoreEvent(){
        
    }
    
    public function clickAcceptEvent(){
        
    }
    
    public function clickDeclineEvent(){
        
    }
    
}
