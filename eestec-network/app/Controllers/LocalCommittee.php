<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class LocalCommittee extends BaseController
{
     protected function prikaz($stranica,$data){
       
        echo view($stranica);
       
    }
    
    public function index(){
        $this->prikaz('login',[]);        
    }
    
}
