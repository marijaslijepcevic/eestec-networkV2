<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class RegUser extends BaseController
{
     protected function prikaz($stranica,$data){
       
        echo view($stranica, $data);
       
    }
    
    public function eventReadMore($id){
        $eventModel = new \App\Models\eventModel();
        $event = $eventModel->where("IdEvent", $id)->first();
        $this->prikaz("eventReadMoreMember", ['event' => $event]);  
    }
    
    public function index(){
        $this->prikaz('memberPage',[]);   //samo promeni stranicu kad se ubaci      
    }
    
     public function viewEvents(){
        $this->prikaz('memberPage',[]);   //samo promeni stranicu kad se ubaci      
    }
    
     public function changeInfo(){
        $user = $this->session->get('user');
        $reguser = $this->session->get('reguser');
        $this->prikaz('memberChangeInfo',["user" => $user , "reguser" => $reguser]);  
    }
    
    public function logout(){
        $this->session->destroy();
        return redirect()->to(site_url("Gost"));
    }
    
    public function changeInfoClick(){
        $reguserModel = new \App\Models\regUserModel;
        $userModel = new \App\Models\userModel();
        $user = $this->session->get('user');
        $id = $user->IdUser;
        if($this->request->getVar("psw")!=null && $this->request->getVar("pswRepeat")==null ){
            $user = $this->session->get('user');
            $reguser = $this->session->get('reguser');
            $this->prikaz('memberChangeInfo',['msg' => "Unesi lozinku dva puta", "user" => $user , "reguser" => $reguser]);
            return;
        }else if($this->request->getVar("psw")==null && $this->request->getVar("pswRepeat")!=null ){
             $user = $this->session->get('user');
            $reguser = $this->session->get('reguser');
            $this->prikaz('memberChangeInfo',['msg' => "Unesi lozinku dva puta", "user" => $user , "reguser" => $reguser]);
            return;
        }else if($this->request->getVar("psw")!=null && $this->request->getVar("pswRepeat")!=null ){
            if($this->request->getVar("psw")!=$this->request->getVar("pswRepeat")){
                $user = $this->session->get('user');
                $reguser = $this->session->get('reguser');
                $this->prikaz('memberChangeInfo',['msg' => "Nisu iste lozinke","user" => $user , "reguser" => $reguser]);
                return;
            }

            $userModel->save([
                
                'IdUser' => $this->session->get('user')->IdUser,
                'psw'=> $this->request->getVar("psw")
            ]);
        }
            
        if($this->request->getVar("fistname")!=null){
           
            $reguserModel->save([
                
                'IdUser' => $this->session->get('user')->IdUser,
                'name'=> $this->request->getVar("fistname")
            ]);
        }
        
        if($this->request->getVar("lastname")!=null){
           
            $reguserModel->save([
                
                'IdUser' => $this->session->get('user')->IdUser,
                'surname'=> $this->request->getVar("lastname")
            ]);
        }
        
        if($this->request->getVar("picture")!=null){
           
            $reguserModel->save([
                
                'IdUser' => $this->session->get('user')->IdUser,
                'picture'=> $this->request->getVar("picture")
            ]);
        }
       
        $this->session->set('user', $userModel->find($id) );
        $this->session->set('reguser', $reguserModel->find($id));
        $this->changeInfo();
    }
  
}
