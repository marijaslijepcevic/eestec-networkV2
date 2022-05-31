<?php
// Marija Slijepčević 0342/2019
// Jovan Dojčilović 0340/2019
namespace App\Controllers;

use CodeIgniter\Controller;
//klasa za sve funkcije lokalnog komiteta
class RegUser extends BaseController
{
    //prikaz stranice $stranica koja se popunjuje podacima $data
     protected function prikaz($stranica,$data){
       
        echo view($stranica, $data);
       
    }
    //prikazuje dodatne informacije o događaju
    public function eventReadMore($id){
        $eventModel = new \App\Models\eventModel();
        $event = $eventModel->where("IdEvent", $id)->first();
        $this->prikaz("eventReadMoreMember", ['event' => $event]);  
    }
    //prikaz osnovne stranice lokalnog komiteta 
    public function index(){
        $eventModel = new \App\Models\eventModel();
        $events = $eventModel->where("isActive", 1)->where("isApproved", 1)->findAll();
         $user = $this->session->get("user");
        $this->prikaz('memberPage',['events' => $events, 'user' => $user]);      
    }
    //prikaz stranice za pregled dogadjaja
     public function viewEvents(){
        $eventModel = new \App\Models\eventModel();
        $events = $eventModel->where("isActive", 1)->where("isApproved", 1)->findAll();
         $user = $this->session->get("user");
        $this->prikaz('memberPage',['events' => $events, 'user' => $user]);      
        
     }
    //prikaz stranice za promenu podataka korisnika
     public function changeInfo(){
        $user = $this->session->get('user');
        $reguser = $this->session->get('reguser');
        $this->prikaz('memberChangeInfo',["user" => $user , "reguser" => $reguser]);
    }
     //odjavljivanje naloga i vraćanje na početnu stranicu
    public function logout(){
        $this->session->destroy();
        return redirect()->to(site_url("Gost"));
    }
     //menja podatke iz baze o korisniku onim koji su zadati u formi
    public function changeInfoClick(){
        $reguserModel = new \App\Models\regUserModel;
        $userModel = new \App\Models\userModel();
        $user = $this->session->get('user');
        $id = $user->IdUser;
        if($this->request->getVar("psw")!=null && $this->request->getVar("pswRepeat")==null ){
            $user = $this->session->get('user');
            $reguser = $this->session->get('reguser');
            $this->prikaz('memberChangeInfo',['msg' => "You need to enter your password twice!", "user" => $user , "reguser" => $reguser]);
            return;
        }else if($this->request->getVar("psw")==null && $this->request->getVar("pswRepeat")!=null ){
             $user = $this->session->get('user');
            $reguser = $this->session->get('reguser');
            $this->prikaz('memberChangeInfo',['msg' => "You need to enter your password twice!", "user" => $user , "reguser" => $reguser]);
            return;
        }else if($this->request->getVar("psw")!=null && $this->request->getVar("pswRepeat")!=null ){
            if($this->request->getVar("psw")!=$this->request->getVar("pswRepeat")){
                $user = $this->session->get('user');
                $reguser = $this->session->get('reguser');
                $this->prikaz('memberChangeInfo',['msg' => "The passwords don't match","user" => $user , "reguser" => $reguser]);
                return;
            }

            $userModel->save([
                
                'IdUser' => $this->session->get('user')->IdUser,
                'psw'=> $this->request->getVar("psw")
            ]);
        }
            
        if($this->request->getVar("fistname")!=null){
           
            $reguserModel->save([
                
                'IdUser' => $this->session->get('user')->IdUser,
                'name'=> $this->request->getVar("fistname")
            ]);
        }
        
        if($this->request->getVar("lastname")!=null){
           
            $reguserModel->save([
                
                'IdUser' => $this->session->get('user')->IdUser,
                'surname'=> $this->request->getVar("lastname")
            ]);
        }
        
        if($this->request->getFile("picture")!=null){
           
            $file = $this->request->getFile('picture');
            $imageName = $file->getRandomName();
            if($file->isValid() && !$file->hasMoved()){
                $file->move('upload/', $imageName);
                //$file->store();
            }
            
            $reguserModel->save([
                
                'IdUser' => $this->session->get('user')->IdUser,
                'picture'=> $imageName
            ]);
        }
       
        $this->session->set('user', $userModel->find($id) );
        $this->session->set('reguser', $reguserModel->find($id));
        
        $user = $this->session->get('user');
        $reguser = $this->session->get('reguser');
        
                
        $this->prikaz('memberChangeInfo',['msg' => "Info changed correctly","user" => $user , "reguser" => $reguser]);
        return;
                
       
    }
  //prijavljuje korisnika na dati dogadjaj
    public function apply($IdEvent){
        $eventAppModel = new \App\Models\eventApplicationModel;
        $eventModel = new \App\Models\eventModel();
        $type = $eventModel->find($IdEvent)->type;
        
        $date = date("Y-m-d");
          
        if($type == 'Workshop' || $type == 'Advanced workshop' ){
            $this->prikaz("memberMotivationalLetter", ['IdEvent' => $IdEvent]);   
            return;
        }else{
            
            $maxId = 0;
            $req = $eventAppModel->findAll();
            foreach ($req as $evApp) {
                if($evApp->id > $maxId){
                    $maxId = $evApp->id;
                }
            }
            $maxId = $maxId + 1;
            $eventAppModel->save([
                'id' => $maxId,
                'IdEvent'=> $IdEvent,
                'IdUser' => $this->session->get('user')->IdUser,
                'dateOfAppl'=> $date
            ]);
            
        }
        
        $eventModel = new \App\Models\eventModel();
        $events = $eventModel->where("isActive", 1)->where("isApproved", 1)->findAll();
        $user = $this->session->get("user");
        $msg = "You have applied for the event!";
        $this->prikaz('memberPage',['events' => $events, 'user' => $user, 'msg' => $msg]);      
        
    }
    //postavlja motivaciono pismo pri prijavi na dogadjaj
     public function submitMotivationalLetter($IdEvent){
        $eventAppModel = new \App\Models\eventApplicationModel;
     
        $request = $_POST['arguments'];
        $letter = $request[0];
        
        $date = date("Y-m-d");
        
        $maxId = 0;
        $req = $eventAppModel->findAll();
        foreach ($req as $evApp) {
            if($evApp->id > $maxId){
                $maxId = $evApp->id;
            }
        }
        $maxId = $maxId + 1;
        $eventAppModel->save([
                'id' => $maxId,
                'IdUser' => $this->session->get('user')->IdUser,
                'IdEvent'=> $IdEvent,
                'dateOfAppl'=> $date,
                'motivationalLetter' => $letter
        ]);
        
       
        
    }
    
    
}


                   