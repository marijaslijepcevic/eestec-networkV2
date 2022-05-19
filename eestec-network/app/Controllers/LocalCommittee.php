<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class LocalCommittee extends BaseController
{
     protected function prikaz($stranica,$data){
       
        echo view($stranica, $data);
       
    }
    
    public function index(){
        $eventModel = new \App\Models\eventModel();
        $events = $eventModel->where("IdEventCom", $this->session->get("user")->IdUser)->findAll();
        $this->prikaz('committeePage', ['events' => $events]);        
    }
    public function viewEvents(){
        $eventModel = new \App\Models\eventModel();
        $events = $eventModel->where("IdEventCom", $this->session->get("user")->IdUser)->findAll();
        $this->prikaz('committeePage', ['events' => $events]);      
    }
    
    public function acceptMembers(){
        $reguserModel = new \App\Models\regUserModel;
        $members = $reguserModel->where('isApproved',0)->where('IdUserCom',$this->session->get('user')->IdUser)->findAll();
        
        $this->prikaz('committeeAcceptMembers',['members'=>$members]);        
    }
    
    public function publishEvents(){
        $this->prikaz('committeePublishEvent',[]);        
    }
    
    public function changeInfo(){
        $user = $this->session->get('user');
        $committee = $this->session->get('committee');
        $this->prikaz('committeeChangeInfo',["user" => $user , "committee" => $committee]);       
    }
    
    public function logout(){
        $this->session->destroy();
        return redirect()->to(site_url("Gost"));  
    }
    
     public function changeInfoClick(){
        $committeeModel = new \App\Models\committeeModel;
        $userModel = new \App\Models\userModel();
        $user = $this->session->get('user');
        $id = $user->IdUser;
        if($this->request->getVar("psw")!=null && $this->request->getVar("pswRepeat")==null ){
            $user = $this->session->get('user');
            $committee = $this->session->get('committee');
            $this->prikaz('committeeChangeInfo',['msg' => "Unesi lozinku dva puta", "user" => $user , "committee" => $committee]);
            return;
        }else if($this->request->getVar("psw")==null && $this->request->getVar("pswRepeat")!=null ){
             $user = $this->session->get('user');
            $committee = $this->session->get('committee');
            $this->prikaz('committeeChangeInfo',['msg' => "Unesi lozinku dva puta", "user" => $user , "committee" => $committee]);
            return;
        }else if($this->request->getVar("psw")!=null && $this->request->getVar("pswRepeat")!=null ){
            if($this->request->getVar("psw")!=$this->request->getVar("pswRepeat")){
                $user = $this->session->get('user');
                $committee = $this->session->get('committee');
                $this->prikaz('committeeChangeInfo',['msg' => "Nisu iste lozinke","user" => $user , "committee" => $committee]);
                return;
            }

            $userModel->save([
                
                'IdUser' => $this->session->get('user')->IdUser,
                'psw'=> $this->request->getVar("psw")
            ]);
        }
            
        if($this->request->getVar("comname")!=null){
           
            $committeeModel->save([
                
                'IdUser' => $this->session->get('user')->IdUser,
                'committeeName'=> $this->request->getVar("comname")
            ]);
        }
        
       
        if($this->request->getVar("picture")!=null){
           
            $committeeModel->save([
                
                'IdUser' => $this->session->get('user')->IdUser,
                'picture'=> $this->request->getVar("picture")
            ]);
        }
        
        if($this->request->getVar("type")!=null){
           
            $committeeModel->save([
                
                'IdUser' => $this->session->get('user')->IdUser,
                'type'=> $this->request->getVar("type")
            ]);
        }
        
        $this->session->set('user', $userModel->find($id) );
        $this->session->set('committee', $committeeModel->find($id));
        $this->changeInfo();
    }
    
    public function publishEventClick(){
        $eventModel = new \App\Models\eventModel;

        $eventModel->save([
                
            "eventName" => $this->request->getVar("event_name"),
            "type" => $this->request->getVar("type"),
            "description" => $this->request->getVar("opis"),
            "numOfParticipants" => $this->request->getVar("br_uc"),
            "picture" => $this->request->getVar("picture"),
            "IdEventCom" => $this->session->get("committee")->IdUser,
            "dateStart" => $this->request->getVar("startDate"),
            "dateEnd" => $this->request->getVar("endDate")
        ]);
        
        $idEvent = $eventModel->getInsertId();
        
        $orgCommitteeModel = new \App\Models\orgCommitteeModel;
        
       
        $eventCommittee = $this->request->getVar("org_odbor");
        $eventCommitteeList = preg_split("/,\s/",$eventCommittee);
        $regUserModel = new \App\Models\regUserModel;
        foreach ($eventCommitteeList as $person) {
            $nameAndSurname = preg_split("/\s/",$person);
            $name = $nameAndSurname[0];           
            $surname = $nameAndSurname[1];
         
            $regUser = $regUserModel->where('name',$name)->where('surname', $surname)->first();
            
            if($regUser==null){
                 $this->prikaz('committeePublishEvent',['msg' => "Nisu svi ljudi korisnici sistema"]);
            }
            
            $IdUser = $regUser->IdUser;
            
            
            $orgCommitteeModel->save([
                "IdUser" =>  $IdUser,
                "IdEvent" => $idEvent,
                      
            ]);
            
           

        }
         $this->index();
    }
    
    public function acceptMembersAccept(){
          $reguserModel = new \App\Models\regUserModel;
          echo "uslo";
         
    }
     
    public function acceptMembersDecline(){
          
          
    }
    
    public function eventReadMore($id, $op){
        $eventModel = new \App\Models\eventModel();
        $event = $eventModel->where("IdEvent", $id)->first();
        $this->prikaz("eventReadMoreCommittee", ['event' => $event, 'op' => $op]);  
    }
    
    public function acceptParticipants($id){
        $eventModel = new \App\Models\eventModel();
        $event = $eventModel->where("IdEvent", $id)->first();
        $eventApplicationModel = new \App\Models\eventApplicationModel();
        $participants = $eventApplicationModel->where('isAccepted', 0)->where('IdEvent', $id)->findAll();
        
        $this->prikaz("committeeAcceptParticipants", ['event' => $event, 'participants'=>$participants]);  
    }
    
    
    public function closeApplications($id){
        $eventModel = new \App\Models\eventModel();
        $event = $eventModel->where("IdEvent", $id)->first();
        $this->prikaz("", ['event' => $event]);  
    }
  
}
