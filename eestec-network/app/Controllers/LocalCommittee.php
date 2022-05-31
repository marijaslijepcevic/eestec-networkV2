<?php
// Sava Andrić 0365/2019
// Jovan Dojčilović 0340/2019
// Marija Slijepčević 0342/2019
namespace App\Controllers;

use CodeIgniter\Controller;
//klasa za sve funkcije lokalnog komiteta
class LocalCommittee extends BaseController
{
     //prikaz stranice $stranica koja se popunjuje podacima $data
     protected function prikaz($stranica,$data){
       
        echo view($stranica, $data);
       
    }
     //prikaz osnovne stranice lokalnog komiteta
    public function index(){
        $eventModel = new \App\Models\eventModel();
        $events = $eventModel->where("IdEventCom", $this->session->get("user")->IdUser)->where("isActive", 1)->where("isApproved", 1)->findAll();
        $this->prikaz('committeePage', ['events' => $events]);        
    }
     //prikaz stranice za pregled dogadjaja
    public function viewEvents(){
        $eventModel = new \App\Models\eventModel();
        $events = $eventModel->where("IdEventCom", $this->session->get("user")->IdUser)->where("isActive", 1)->where("isApproved", 1)->findAll();
        $this->prikaz('committeePage', ['events' => $events]);      
    }
     //prikaz stranice za prihvatanje članova
    public function acceptMembers(){
        $reguserModel = new \App\Models\regUserModel;
        $members = $reguserModel->where('isApproved',0)->where('IdUserCom',$this->session->get('user')->IdUser)->findAll();
        
        $this->prikaz('committeeAcceptMembers',['members'=>$members]);        
    }
    //prikaz stranice za objavljivanje dogadjaja
    public function publishEvents(){
        $committeeModel = new \App\Models\committeeModel;
        $committees = $committeeModel->findAll();
        $this->prikaz('committeePublishEvent',["committees" => $committees]);        
    }
     //prikaz stranice za promenu podataka korisničkog lokalnog komiteta
    public function changeInfo(){
        $user = $this->session->get('user');
        $committee = $this->session->get('committee');
        $this->prikaz('committeeChangeInfo',["user" => $user , "committee" => $committee]);       
    }
    //odjavljivanje naloga i vraćanje na početnu stranicu
    public function logout(){
        $this->session->destroy();
        return redirect()->to(site_url("Gost"));  
    }
    //menja podatke iz baze o lokalnom komitetu onim koji su zadati u formi
     public function changeInfoClick(){
        $committeeModel = new \App\Models\committeeModel;
        $userModel = new \App\Models\userModel();
        $user = $this->session->get('user');
        $id = $user->IdUser;
        if($this->request->getVar("psw")!=null && $this->request->getVar("pswRepeat")==null ){
            $user = $this->session->get('user');
            $committee = $this->session->get('committee');
            $this->prikaz('committeeChangeInfo',['msg' => "You need to enter your password twice!", "user" => $user , "committee" => $committee]);
            return;
        }else if($this->request->getVar("psw")==null && $this->request->getVar("pswRepeat")!=null ){
             $user = $this->session->get('user');
            $committee = $this->session->get('committee');
            $this->prikaz('committeeChangeInfo',['msg' => "You need to enter your password twice!", "user" => $user , "committee" => $committee]);
            return;
        }else if($this->request->getVar("psw")!=null && $this->request->getVar("pswRepeat")!=null ){
            if($this->request->getVar("psw")!=$this->request->getVar("pswRepeat")){
                $user = $this->session->get('user');
                $committee = $this->session->get('committee');
                $this->prikaz('committeeChangeInfo',['msg' => "The passwords don't match","user" => $user , "committee" => $committee]);
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
        
       
        if($this->request->getFile("picture")!=null){
           
            $file = $this->request->getFile('picture');
            $imageName = $file->getRandomName();
            if($file->isValid() && !$file->hasMoved()){
                $file->move('upload/', $imageName);
                //$file->store();
            }
            
            $committeeModel->save([
                
                'IdUser' => $this->session->get('user')->IdUser,
                'picture'=> $imageName
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
        
        $user = $this->session->get('user');
        $committee = $this->session->get('committee');
        $this->prikaz('committeeChangeInfo',['msg' => "Info changed correctly", "user" => $user , "committee" => $committee]);      
        
       
    }
    //objavljuje novi dogadjaj na osnovu podataka iz forme
    public function publishEventClick(){
        $eventModel = new \App\Models\eventModel;
        
        $file = $this->request->getFile('picture');
        $imageName = $file->getRandomName();
        if($file->isValid() && !$file->hasMoved()){
            $file->move('upload/', $imageName);
            //$file->store();
        }

        $eventModel->save([
                
            "eventName" => $this->request->getVar("event_name"),
            "type" => $this->request->getVar("type"),
            "description" => $this->request->getVar("opis"),
            "numOfParticipants" => $this->request->getVar("br_uc"),
            "picture" => $imageName,
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
                 $this->prikaz('committeePublishEvent',['msg' => "The people you entered are don't have eestec.net accounts!"]);
                 return;
            }
            
            $IdUser = $regUser->IdUser;
            
            
            $orgCommitteeModel->save([
                "IdUser" =>  $IdUser,
                "IdEvent" => $idEvent,
                      
            ]);
            
           

        }
        $eventModel = new \App\Models\eventModel();
        $events = $eventModel->where("IdEventCom", $this->session->get("user")->IdUser)->where("isActive", 1)->where("isApproved", 1)->findAll();
        $this->prikaz('committeePage', ['events' => $events]);           
    }
    //prihvata zahteve korisnika da se priključe lokalnom komitetu
    public function acceptMembersAccept(){
          $request = $_POST['arguments'];
          $reguserModel = new \App\Models\regUserModel;
    
        
        
        foreach ($request as $IdUser) {
            $reguserModel->save([
                "IdUser" =>  $IdUser,
                "isApproved" => 1,
                      
            ]);
            
           
        }

         
    }
     //odbija zahteve korisnika da se priključe lokalnom komitetu
    public function acceptMembersDecline(){
        $request = $_POST['arguments'];
        $reguserModel = new \App\Models\regUserModel;
    
        
        
        foreach ($request as $IdUser) {
            $reguserModel->save([
                "IdUser" =>  $IdUser,
                "isApproved" => 2,
                      
            ]);
            
           
        }
          
    }
     //prikazuje dodatne informacije o događaju
    public function eventReadMore($id, $op){
        $eventModel = new \App\Models\eventModel();
        $event = $eventModel->where("IdEvent", $id)->first();
        $this->prikaz("eventReadMoreCommittee", ['event' => $event, 'op' => $op]);  
    }
    //prikaz stranice za prihvatanje prijavljenih korisnika na dogadjaje
    public function acceptParticipants($id){
        $eventModel = new \App\Models\eventModel();
        $event = $eventModel->where("IdEvent", $id)->first();
        $eventApplicationModel = new \App\Models\eventApplicationModel();
        $participants = $eventApplicationModel->where('isAccepted', 0)->where('IdEvent', $id)->findAll();
        
        $this->prikaz("committeeAcceptParticipants", ['event' => $event, 'participants'=>$participants]);  
    }
    
    //onemogućuje dalje prijave na dogadjaje
    public function closeApplications($id){
        $eventModel = new \App\Models\eventModel();
        
        if($id > 0){
            $event = $eventModel->where('IdEvent', $id);
            $event->save([
                "IdEvent" => $id,
                "openApplications" =>  0        
            ]);
        }
        
        $events = $eventModel->where("IdEventCom", $this->session->get("user")->IdUser)->where("isActive", 1)->where("isApproved", 1)->findAll();
        $this->prikaz('committeePage', ['events' => $events]);     
    }
    //prihvata zahteve korisnika da učestvuju na događajima
    public function acceptParticipantsAccept($IdEvent){
        $request = $_POST['arguments'];
        $eventApplicationModel = new \App\Models\eventApplicationModel;
        $numOfAcc = array_pop($request);
        foreach ($request as $IdUser) {
            $evsave = $eventApplicationModel->where("IdEvent", $IdEvent)->where("IdUser", $IdUser)->first();
            $eventApplicationModel->save([
                "id" => $evsave->id,
                "IdUser" => $IdUser,
                "IdEvent" => $IdEvent,
                "isAccepted" => 1,
                      
            ]);     
        }
        $eventModel = new \App\Models\eventModel;
        $ev = $eventModel->find($IdEvent);
        $ev->save([
            "IdEvent" => $IdEvent,
            "numOfAcc" => $numOfAcc
        ]);
         
        
        
    }
    //završava izbor participanata i onemogućuje dalje prihvaćanje novih
    public function acceptParticipantsFinish($IdEvent){
        $eventModel = new \App\Models\eventModel;
        $eventModel->save([
            "IdEvent" => $IdEvent,
            "finishedSelection" => 1,
            "openApplications" => 0

        ]);          
        $events = $eventModel->where("IdEventCom", $this->session->get("user")->IdUser)->where("isActive", 1)->where("isApproved", 1)->findAll();
        $this->prikaz('committeePage', ['events' => $events]);      
    }
    //prikazuje motivaciono pismo korisnika koji zeli da se prijavi na dati dogadjaj
    public function motivationalLetterclick($idEvent, $IdUser){
        $eventApplicationModel = new \App\Models\eventApplicationModel;
        $letter = $eventApplicationModel->where("IdEvent", $idEvent)->where("IdUser",$IdUser)->first()->motivationalLetter;
        $this->prikaz("readMotivationalLetter", ['letter' => $letter, "IdEvent" => $idEvent]);  
    }
    
}
