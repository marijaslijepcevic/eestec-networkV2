<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class RegUser extends Controller
{
     protected function prikaz($stranica,$data){
       
        echo view($stranica);
       
    }
    
    public function index(){
        $this->prikaz('memberPage',[]);   //samo promeni stranicu kad se ubaci      
    }
    
     public function viewEvents(){
        $this->prikaz('memberPage',[]);   //samo promeni stranicu kad se ubaci      
    }
    
     public function changeInfo(){
        $this->prikaz('memberPage',[]);   //samo promeni stranicu kad se ubaci      
    }
    /*
     public function logout(){
        $this->session->destroy();
        return redirect()->to(site_url("Gost"));
    }
  */
}
