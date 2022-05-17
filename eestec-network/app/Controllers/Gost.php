<?php

namespace App\Controllers;


use CodeIgniter\Controller;

class Gost extends Controller
{
     protected function prikaz($stranica,$data){
       
        echo view($stranica,$data);
       
    }
    
    public function index(){
        $this->prikaz('login',[]);        
    }
  
    
     public function loginSubmit()
    {
         //skontaj ko se loguje
        $userModel = new \App\Models\userModel();
        $user = $userModel->where('username', $this->request->getVar("uname"))->first();
       
        //proveri da li postoji korisnik
        if($user==null){
          $this->prikaz('login',['msg' => "Korisnik ne postoji"]);
          return;
        }
     
        //proveri da li je dobra sifra
        if($user->psw!=$this->request->getVar("psw")){
          $this->prikaz('login',['msg' => "Pogresna lozinka"]);
          return;
        }
        
        //proveri jel odobren taj korisnik
        $id = $user->IdUser;
        
        $reguserModel = new \App\Models\regUserModel;
        $reguser = $reguserModel->where('IdUser', $id)->first();
        
        if($reguser!=null){
            if( $reguser->isApproved == 0){
                $this->prikaz('login',['msg' => "Lokalni komitet te nije odobrio!"]);
                return;
            }
            $this->session->set('user',$user);
            $this->session->set('reguser',$reguser);
            return redirect()->to(site_url("RegUser"));
        }
   
        $committeeModel = new \App\Models\regUserModel;
        $committee = $committeeModel->where('IdUser', $id)->first();
          
        if($committee!=nul){
            if($committee->isApproved == 0){
                $this->prikaz('login',['msg' => "Admin te nije odobrio!"]);
                return;                
            }
            $this->session->set('user',$user);
            $this->session->set('committee',$committee);
            return redirect()->to(site_url("LocalCommittee"));
        }
    }
   
    
    public function register(){
        $this->prikaz('registrationPicker',[]); 
        
    }
    
    public function memberRegister(){
        $this->prikaz('memberRegistration',[]); 
        
        $email = $this->request->getVar("email");
        $userModel = new \App\Models\userModel();
        $user = $userModel->where('email', $email)->first();
        
        if($user!=null){
            $this->prikaz('login',['msg' => "Postoji nalog sa ovim email-om!"]);
            return; 
        }
        
        $uname = $this->request->getVar("uname");
        $user = $userModel->where('username', $uname)->first();
        
        if($user!=null){
            $this->prikaz('login',['msg' => "Postoji nalog sa ovim username-om!"]);
            return; 
        }
       
        $psw = $this->request->getVar("psw");
        $pswRepeat = $this->request->getVar("pswRepeat");
        
        if($psw!=$pswRepeat){
            $this->prikaz('login',['msg' => "Sifre nisu iste"]);
            return; 
        }
       
        $firstname = $this->request->getVar("fistname");
        $lastname = $this->request->getVar("lastname");
        
        
        $type = $this->request->getVar("type");
        //$picture if
        
        
        
    }
    
    public function committeeRegister(){
        $this->prikaz('committeeRegistration',[]); 
 
        $email = $this->request->getVar("email");
        //proveri jel vec postoji u bazi
        $uname = $this->request->getVar("uname");
        //proveri jel vec postoji u bazi
        $psw = $this->request->getVar("psw");
        $pswRepeat = $this->request->getVar("pswRepeat");
        //proveri jel su iste
        //comname
        //university
        //picture
        //type
    }
    
    
}
