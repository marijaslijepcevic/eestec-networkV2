<?php

namespace App\Controllers;


use CodeIgniter\Controller;

class Gost extends BaseController
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
   
        $committeeModel = new \App\Models\committeeModel;
        $committee = $committeeModel->where('IdUser', $id)->first();
          
        if($committee!=null){
            if($committee->isApproved == 0){
                $this->prikaz('login',['msg' => "Admin te nije odobrio!"]);
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
   
    
    public function register(){
        $this->prikaz('registrationPicker',[]);   
    }
    
    public function memberRegister(){
        $this->prikaz('memberRegistration',[]);       
    }
    
    public function committeeRegister(){
        $this->prikaz('committeeRegistration',[]);
    }
    
    public function memberRegisterClick(){
        $email = $this->request->getVar("email");
        $userModel = new \App\Models\userModel();
        $user = $userModel->where('email', $email)->first();
        
        if($user!=null){
            $this->prikaz('memberRegistration',['msg' => "Postoji nalog sa ovim email-om!"]);
            return; 
        }
        
        $uname = $this->request->getVar("uname");
        $user = $userModel->where('username', $uname)->first();
        
        if($user!=null){
            $this->prikaz('memberRegistration',['msg' => "Postoji nalog sa ovim username-om!"]);
            return; 
        }
       
        $psw = $this->request->getVar("psw");
        $pswRepeat = $this->request->getVar("pswRepeat");
        
        if($psw!=$pswRepeat){
            $this->prikaz('memberRegistration',['msg' => "Sifre nisu iste"]);
            return; 
        }
       
        $firstname = $this->request->getVar("fistname");
        $lastname = $this->request->getVar("lastname");
        
        
        $committeeName = $this->request->getVar("committee");
        $committeeModel = new \App\Models\committeeModel();
        $committee = $committeeModel->where('committeeName', $committeeName)->first();
        $committeeId = $committee->IdUser;
        
        $picture = $this->request->getVar("picture");
        
        $reguserModel = new \App\Models\regUserModel;
        
        $date = date("Y-m-d");
       
        
        $userModel->save([
            'username' => $uname,
            'psw'=> $psw,
            'email' => $email 
        ]);
        $idUser = $userModel->getInsertId();
        
        if($picture!=null){
            $reguserModel->save([
                'IdUser' => $idUser,
                'IdUserCom' => $committeeId,
                'name'=> $firstname,
                'surname'=> $lastname,
                'picture' => $picture,
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
    
     public function committeeRegisterClick(){
         
        $email = $this->request->getVar("email");
        $userModel = new \App\Models\userModel();
        $user = $userModel->where('email', $email)->first();
        
        if($user!=null){
            $this->prikaz('memberRegistration',['msg' => "Postoji nalog sa ovim email-om!"]);
            return; 
        }
        
        $uname = $this->request->getVar("uname");
        $user = $userModel->where('username', $uname)->first();
        
        if($user!=null){
            $this->prikaz('memberRegistration',['msg' => "Postoji nalog sa ovim username-om!"]);
            return; 
        }
       
        $psw = $this->request->getVar("psw");
        $pswRepeat = $this->request->getVar("pswRepeat");
        
        if($psw!=$pswRepeat){
            $this->prikaz('memberRegistration',['msg' => "Sifre nisu iste"]);
            return; 
        }
       
        $comname = $this->request->getVar("comname");
        $university = $this->request->getVar("university");
        $type = $this->request->getVar("type");
        $picture = $this->request->getVar("picture");
        
        $committeeModel = new \App\Models\committeeModel;
        
        $date = date("Y-m-d");
       
        
        $userModel->save([
            'username' => $uname,
            'psw'=> $psw,
            'email' => $email 
        ]);
        $idUser = $userModel->getInsertId();
        
        if($picture!=null){
            $committeeModel->save([
                'IdUser' => $idUser,
                'committeeName' => $comname,
                'universityName'=> $university,
                'type'=> $type,
                'picture' => $picture,
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
