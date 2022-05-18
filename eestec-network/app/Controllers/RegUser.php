<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Gost extends Controller
{
     protected function prikaz($stranica,$data){
       
        echo view($stranica);
       
    }
    
    public function index(){
        $this->prikaz('login',[]);   //samo promeni stranicu kad se ubaci      
    }
 

    
}
