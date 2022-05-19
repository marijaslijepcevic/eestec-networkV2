<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\eventModel;

class Admin extends BaseController
{
     protected function prikaz($stranica,$data){
        echo view($stranica, $data);    
    }
    
    public function index(){
        $eventModel = new \App\Models\eventModel();
        $events = $eventModel->where("isApproved", 0)->findAll();
        $this->prikaz("adminAcceptEvents", ['events' => $events]);  
    }
  
      
    public function acceptEvents($id = 0, $op = 0){
        $eventModel = new \App\Models\eventModel();
        
        if($id > 0 && $op == 1){
            $event = $eventModel->where('IdEvent', $id);
            $event->save([
                "IdEvent" => $id,
                "isApproved" =>  1        
            ]);
        }
        
        if($id > 0 && $op == 2){
            $event = $eventModel->where('IdEvent', $id);
            $event->save([
                "IdEvent" => $id,
                "isApproved" =>  2        
            ]);
        }
        
        $events = $eventModel->where("isApproved", 0)->findAll();
        $this->prikaz("adminAcceptEvents", ['events' => $events]);      
          
    }
    
    public function deleteEvents($id = 0, $op = 0){  
        $eventModel = new \App\Models\eventModel();
        
        
        
        if($id > 0 && $op == 3){
            $event = $eventModel->where('IdEvent', $id);
            $event->save([
                "IdEvent" => $id,
                "isApproved" =>  2        
            ]);
        }
        
        $events = $eventModel->where("isActive", 1)->findAll();
        $this->prikaz("adminDeleteEvents", ['events' => $events]);
    }
    
    public function acceptCommittees(){
        $committeeModel = new \App\Models\committeeModel();
        $committees = $committeeModel->where("isApproved", 0)->findAll();
        //$this->session->set('committees', $committees);
        $this->prikaz("adminAcceptCommittees", ['committees' => $committees]);  
    }
    
    public function eventReadMore($id = 1){
        $eventModel = new \App\Models\eventModel();
        $event = $eventModel->where("IdEvent", $id);
        $this->prikaz("eventReadMore", ['event' => $event]);  
    }
    
    public function clickDeleteEvent(){
        
    }

}
