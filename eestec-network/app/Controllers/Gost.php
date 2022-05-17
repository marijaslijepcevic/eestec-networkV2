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

        //proveri da li postoji korisnik
        //proveri jel odobren taj korisnik
        //proveri da li je dobra sifra
        /*$autorModel = new AutorModel();
        $autor = $autorModel->find($this->request->getVar("uname"));
        if($autor==null){
          $this->prikazi('login',['poruka' => "Korisnik ne postoji"]);
          return;
        }
        
        if($autor->lozinka!=$this->request->getVar("lozinka")){
          $this->prikazi('login',['poruka' => "Pogresna lozinka"]);
          
        }
        $this->session->set('autor',$autor);
        
        return redirect()->to(site_url("Korisnik"));*/
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
