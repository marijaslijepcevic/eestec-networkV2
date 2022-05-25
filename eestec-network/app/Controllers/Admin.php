<?php
// Sava Andrić 0365/2019
// Marija Slijepčević 0342/2019
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
                "isApproved" =>  1,
                "openApplications" =>  1,
                "isActive" =>  1,
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
    
    public function deleteEvents($id = 0){  
        $eventModel = new \App\Models\eventModel();

        if($id > 0){
            $event = $eventModel->where('IdEvent', $id);
            $event->save([
                "IdEvent" => $id,
                "isActive" =>  0        
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
    
    public function eventReadMore($id, $op){
        $eventModel = new \App\Models\eventModel();
        $event = $eventModel->where("IdEvent", $id)->first();
        $this->prikaz("eventReadMore", ['event' => $event, 'op' => $op]);  
    }
    
    public function logout(){
        $this->session->destroy();
        return redirect()->to(site_url("Gost"));
    }

    public function acceptCommitteesAccept(){
          $request = $_POST['arguments'];
          $committeeModel = new \App\Models\CommitteeModel;
    
        foreach ($request as $IdUser) {
            $committeeModel->save([
                "IdUser" =>  $IdUser,
                "isApproved" => 1,
                      
            ]);
            
           
        }   
    }
     
    public function acceptCommitteesDecline(){
        $request = $_POST['arguments'];
        $committeeModel = new \App\Models\CommitteeModel;      
        
        foreach ($request as $IdUser) {
            $committeeModel->save([
                "IdUser" =>  $IdUser,
                "isApproved" => 2,
                      
            ]);
           
        }
          
    }
    
}
