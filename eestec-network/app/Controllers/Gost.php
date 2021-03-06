<?php
// Marija Slijepčević 0342/2019
// Jovan Dojčilović 0340/2019
namespace App\Controllers;


use CodeIgniter\Controller;
/**
 * Gost kontroler - klasa za sve funkcije neulogovanog korisnika
 */
class Gost extends BaseController
{   /**
     * Prikazivanje zadate stranice sa potrebnim informacijama.
     * @param type $stranica
     * @param type $data
     */
     protected function prikaz($stranica,$data){
       
        echo view($stranica,$data);
       
    }
    /**
     * Prikazivanje pocetne stranice(login stranice).
     */
    public function index(){
        $this->prikaz('login',[]);  
        
    }
    /**
     * Prikazivanje stranice sa svim aktivnim dogadjajima.
     */
    public function guestPage(){
        $eventModel = new \App\Models\eventModel();
        $events = $eventModel->where("isActive", 1)->findAll();
        $this->prikaz("guestPage", ['events' => $events]);  
    }
    /**
     * Prikazivanje stranice za prikaz dodatnih informacija odredjenog dogadjaja.
     * 
     * @param type $id
     */
    public function eventReadMore($id){
        $eventModel = new \App\Models\eventModel();
        $event = $eventModel->where("IdEvent", $id)->first();
        $this->prikaz("eventReadMoreGost", ['event' => $event]);  
    }
  
    /**
     * Provera login informacija i potencijalno logovanje na odredjeni nalog.
     * 
     * @return type
     */
     public function loginSubmit()
    {
         //skontaj ko se loguje
        $userModel = new \App\Models\userModel();
        $user = $userModel->where('username', $this->request->getVar("uname"))->first();
       
        //proveri da li postoji korisnik
        if($user==null){
          $this->prikaz('login',['msg' => "User doesn't exist"]);
          return;
        }
     
        //proveri da li je dobra sifra
        if($user->psw!=$this->request->getVar("psw")){
          $this->prikaz('login',['msg' => "Wrong password"]);
          return;
        }
        
        //proveri jel odobren taj korisnik
        $id = $user->IdUser;
        
        $reguserModel = new \App\Models\regUserModel;
        $reguser = $reguserModel->where('IdUser', $id)->first();
        
        if($reguser!=null){
            if( $reguser->isApproved == 0){
                $this->prikaz('login',['msg' => "You Local Committee hasn't approved your account yet!"]);
                return;
            }
            $this->session->set('user',$user);
            $this->session->set('reguser',$reguser);
            return redirect()->to(site_url("RegUser"));
        }
   
        $committeeModel = new \App\Models\committeeModel;
        $committee = $committeeModel->where('IdUser', $id)->first();
          
        if($committee!=null){
            if($committee->isApproved == 0){
                $this->prikaz('login',['msg' => "The Admin hasn't approved your account yet!"]);
                return;                
            }
            $this->session->set('user',$user);
            $this->session->set('committee',$committee);
            return redirect()->to(site_url("LocalCommittee"));
        }
        
        $adminModel = new \App\Models\adminModel;
        $admin = $adminModel->where('IdUser', $id)->first();
        $this->session->set('user',$user);
        $this->session->set('admin',$admin);
        return redirect()->to(site_url("Admin"));
    }
   
     /**
     * Prikaz stranice za izbor entiteta koji zeli da se registruje.
     */
    public function register(){
        $this->prikaz('registrationPicker',[]);   
    }
    /**
     * Prikaz stranice za registraciju clana udruzenja.
     */
    public function memberRegister(){
        $this->prikaz('memberRegistration',[]);       
    }
    /**
     * Prikaz stranice za registraciju komiteta
     */
    public function committeeRegister(){
        $this->prikaz('committeeRegistration',[]);
    }
    /**
     * Provera informacija za registraciju clana udruzenja.
     * @return type
     */
    public function memberRegisterClick(){
        $email = $this->request->getVar("email");
        $userModel = new \App\Models\userModel();
        $user = $userModel->where('email', $email)->first();
        
        if($user!=null){
            $this->prikaz('memberRegistration',['msg' => "An account with this email already exists!"]);
            return; 
        }
        
        $uname = $this->request->getVar("uname");
        
        $user = $userModel->where('username', $uname)->first();
        
        if($user!=null){
            $this->prikaz('memberRegistration',['msg' => "An account with this username already exists!"]);
            return; 
        }
       
        $psw = $this->request->getVar("psw");
        $pswRepeat = $this->request->getVar("pswRepeat");
        
        if($psw!=$pswRepeat){
            $this->prikaz('memberRegistration',['msg' => "Passwords don't match"]);
            return; 
        }
       
        $firstname = $this->request->getVar("fistname");
        $lastname = $this->request->getVar("lastname");
        
        
        $committeeName = $this->request->getVar("committee");
        $committeeModel = new \App\Models\committeeModel();
        $committee = $committeeModel->where('committeeName', $committeeName)->first();
        $committeeId = $committee->IdUser;
        
        $imageName = null;
        if($this->request->getFile("picture")!=null){
           
            $file = $this->request->getFile('picture');
            $imageName = $file->getRandomName();
            if($file->isValid() && !$file->hasMoved()){
                $file->move('upload/', $imageName);
                //$file->store();
            }
            
        }
        
        $reguserModel = new \App\Models\regUserModel;
        
        $date = date("Y-m-d");
       
        
        $userModel->save([
            'username' => $uname,
            'psw'=> $psw,
            'email' => $email 
        ]);
        $idUser = $userModel->getInsertId();
        
        if($imageName!=null){
            $reguserModel->save([
                'IdUser' => $idUser,
                'IdUserCom' => $committeeId,
                'name'=> $firstname,
                'surname'=> $lastname,
                'picture' => $imageName,
                'dateOfReg' => $date
            ]);
        }else{
             
            $reguserModel->save([
                
                'IdUser' => $idUser,
                'IdUserCom' => $committeeId,
                'name'=> $firstname,
                'surname'=> $lastname,
                'dateOfReg' => $date
            ]);
        }
        
        $this->prikaz('login',[]);      
         
    }
     /**
     * Provera informacija za registraciju komiteta.
     * 
     * @return type
     */
     public function committeeRegisterClick(){
         
        $email = $this->request->getVar("email");
        $userModel = new \App\Models\userModel();
        $user = $userModel->where('email', $email)->first();
        
        if($user!=null){
            $this->prikaz('memberRegistration',['msg' => "An account with this email already exists!"]);
            return; 
        }
        
        $uname = $this->request->getVar("uname");
        $user = $userModel->where('username', $uname)->first();
        
        if($user!=null){
            $this->prikaz('memberRegistration',['msg' => "An account with this username already exists!"]);
            return; 
        }
       
        $psw = $this->request->getVar("psw");
        $pswRepeat = $this->request->getVar("pswRepeat");
        
        if($psw!=$pswRepeat){
            $this->prikaz('memberRegistration',['msg' => "Passwords don't match"]);
            return; 
        }
       
        $comname = $this->request->getVar("comname");
        $university = $this->request->getVar("university");
        $type = $this->request->getVar("type");
        
        $imageName = null;
        if($this->request->getFile("picture")!=null){
           
            $file = $this->request->getFile('picture');
            $imageName = $file->getRandomName();
            if($file->isValid() && !$file->hasMoved()){
                $file->move('upload/', $imageName);
                //$file->store();
            }
            
        }
         
        
        $committeeModel = new \App\Models\committeeModel;
        
        $date = date("Y-m-d");
       
        
        $userModel->save([
            'username' => $uname,
            'psw'=> $psw,
            'email' => $email 
        ]);
        $idUser = $userModel->getInsertId();
        
        if($imageName!=null){
            $committeeModel->save([
                'IdUser' => $idUser,
                'committeeName' => $comname,
                'universityName'=> $university,
                'type'=> $type,
                'picture' => $imageName,
                'dateOfReg' => $date
            ]);
        }else{
            $committeeModel->save([
                'IdUser' => $idUser,
                'committeeName' => $comname,
                'universityName'=> $university,
                'type'=> $type,
                'dateOfReg' => $date
            ]);
        }
  
        $this->prikaz('login',[]);      
         
    }
    
     
    
}
