<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Gost extends Controller
{
     protected function prikaz($stranica,$data){
       
        echo view($stranica);
       
    }
    
    public function index(){
        $this->prikaz('login',[]);        
    }
  
    
     public function loginSubmit()
    {

        
        
        
         //skontaj ko se loguje
        $userModel = new App\Models\userModel();
        $user = $userModel->where('username', $this->request->getVar("uname"));
        
       
        $reguserModel = new App\Models\regUserModel;
        //$reguser = $reguserModel->where('IdUser', $id);
        
        //proveri da li postoji korisnik
        if($user==null){
          $this->prikaz('login',['msg' => "Korisnik ne postoji"]);
          return;
        }
        
        //proveri jel odobren taj korisnik
        
        
        //proveri da li je dobra sifra
        if($user->password!=$this->request->getVar("psw")){
          $this->prikaz('login',['msg' => "Pogresna lozinka"]);
          
        }
        $this->session->set('user',$user);
        
        //ako je reguser
         $this->session->set('reguser',$reguser);
        
        //return redirect()->to(site_url("Korisnik"));*/
    }
   
    
    public function register(){
        $this->prikaz('registrationPicker',[]); 
        
    }
    
    public function memberRegister(){
        $this->prikaz('memberRegistration',[]); 
        $email = $this->request->getVar("email");
        //proveri jel vec postoji u bazi
        $uname = $this->request->getVar("uname");
        //proveri jel vec postoji u bazi
        $psw = $this->request->getVar("psw");
        $pswRepeat = $this->request->getVar("pswRepeat");
        //proveri jel su iste
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
