<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class LocalCommittee extends BaseController
{
     protected function prikaz($stranica,$data){
       
        echo view($stranica, $data);
       
    }
    
    public function index(){
        $this->prikaz('committeePage',[]);        
    }
    public function viewEvents(){
        $this->prikaz('login',[]);        
    }
    
    public function acceptMembers(){
        $this->prikaz('login',[]);        
    }
    
    public function publishEvents(){
        $this->prikaz('login',[]);        
    }
    
    public function changeInfo(){
        $user = $this->session->get('user');
        $committee = $this->session->get('committee');
        $this->prikaz('committeeChangeInfo',["user" => $user , "committee" => $committee]);       
    }
    
    public function logout(){
        $this->session->destroy();
        return redirect()->to(site_url("Gost"));  
    }
    
     public function changeInfoClick(){
        $committeeModel = new \App\Models\committeeModel;
        $userModel = new \App\Models\userModel();
        $user = $this->session->get('user');
        $id = $user->IdUser;
        if($this->request->getVar("psw")!=null && $this->request->getVar("pswRepeat")==null ){
            $user = $this->session->get('user');
            $committee = $this->session->get('committee');
            $this->prikaz('committeeChangeInfo',['msg' => "Unesi lozinku dva puta", "user" => $user , "committee" => $committee]);
            return;
        }else if($this->request->getVar("psw")==null && $this->request->getVar("pswRepeat")!=null ){
             $user = $this->session->get('user');
            $committee = $this->session->get('committee');
            $this->prikaz('committeeChangeInfo',['msg' => "Unesi lozinku dva puta", "user" => $user , "committee" => $committee]);
            return;
        }else if($this->request->getVar("psw")!=null && $this->request->getVar("pswRepeat")!=null ){
            if($this->request->getVar("psw")!=$this->request->getVar("pswRepeat")){
                $user = $this->session->get('user');
                $committee = $this->session->get('committee');
                $this->prikaz('committeeChangeInfo',['msg' => "Nisu iste lozinke","user" => $user , "committee" => $committee]);
                return;
            }

            $userModel->save([
                
                'IdUser' => $this->session->get('user')->IdUser,
                'psw'=> $this->request->getVar("psw")
            ]);
        }
            
        if($this->request->getVar("comname")!=null){
           
            $committeeModel->save([
                
                'IdUser' => $this->session->get('user')->IdUser,
                'committeeName'=> $this->request->getVar("comname")
            ]);
        }
        
       
        if($this->request->getVar("picture")!=null){
           
            $committeeModel->save([
                
                'IdUser' => $this->session->get('user')->IdUser,
                'picture'=> $this->request->getVar("picture")
            ]);
        }
        
        if($this->request->getVar("type")!=null){
           
            $committeeModel->save([
                
                'IdUser' => $this->session->get('user')->IdUser,
                'type'=> $this->request->getVar("type")
            ]);
        }
        
        $this->session->set('user', $userModel->find($id) );
        $this->session->set('committee', $committeeModel->find($id));
        $this->changeInfo();
    }
    
}
