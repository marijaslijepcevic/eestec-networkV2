<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class LocalCommittee extends Controller
{
     protected function prikaz($stranica,$data){
       
        echo view($stranica);
       
    }
    
    public function index(){
        $this->prikaz('login',[]);        
    }
    
}
