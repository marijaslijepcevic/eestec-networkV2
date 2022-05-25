<?php
// Sava Andrić 0365/2019
// Marija Slijepčević 0342/2019
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\eventModel;
/**
 * Admin kontroler - klasa za sve funkcije admina
 */
class Admin extends BaseController
{
    /**
     * Prikazivanje zadate stranice sa potrebnim informacijama.
     * @param type $stranica
     * @param type $data
     */
     protected function prikaz($stranica,$data){
        echo view($stranica, $data);    
    }
    /**
     * Prikazivanje pocetne stranice
     */
    public function index(){
        $eventModel = new \App\Models\eventModel();
        $events = $eventModel->where("isApproved", 0)->findAll();
        $this->prikaz("adminAcceptEvents", ['events' => $events]);  
    }
  
   /**
   * 
    * Prikazivanje stranice za odobravanje dogadjaja od strane admina.
    * 
   * @param type $id
   * @param type $op 
   */    
    public function acceptEvents($id = 0, $op = 0){
        $eventModel = new \App\Models\eventModel();
        
        if($id > 0 && $op == 1){
            $event = $eventModel->where('IdEvent', $id);
            $event->save([
                "IdEvent" => $id,
                "isApproved" =>  1,
                "openApplications" =>  1,
                "isActive" =>  1,
            ]);
        }
        
        if($id > 0 && $op == 2){
            $event = $eventModel->where('IdEvent', $id);
            $event->save([
                "IdEvent" => $id,
                "isApproved" =>  2        
            ]);
        }
        
        $events = $eventModel->where("isApproved", 0)->findAll();
        $this->prikaz("adminAcceptEvents", ['events' => $events]);      
          
    }
    
    /**
     * 
     * Prikazivanje stranice sa dogadjajima, gde je moguce obrisati neki od njih.
     * @param type $id
     */
    public function deleteEvents($id = 0){  
        $eventModel = new \App\Models\eventModel();

        if($id > 0){
            $event = $eventModel->where('IdEvent', $id);
            $event->save([
                "IdEvent" => $id,
                "isActive" =>  0        
            ]);
        }
        
        $events = $eventModel->where("isActive", 1)->findAll();
        $this->prikaz("adminDeleteEvents", ['events' => $events]);
    }
    /**
     * Prikazivanje stranice za prihvatanje komiteta
     */
    public function acceptCommittees(){
        $committeeModel = new \App\Models\committeeModel();
        $committees = $committeeModel->where("isApproved", 0)->findAll();
        //$this->session->set('committees', $committees);
        $this->prikaz("adminAcceptCommittees", ['committees' => $committees]);  
    }
    
    /**
     * Prikazivanje stranice za prikaz dodatnih informacija odredjenog dogadjaja.
     * 
     * @param type $id
     * @param type $op
     */
    public function eventReadMore($id, $op){
        $eventModel = new \App\Models\eventModel();
        $event = $eventModel->where("IdEvent", $id)->first();
        $this->prikaz("eventReadMore", ['event' => $event, 'op' => $op]);  
    }
    /**
     * Odjavljivanje naloga i vracanje na pocetnu stranicu.
     * 
     * @return type
     */
    public function logout(){
        $this->session->destroy();
        return redirect()->to(site_url("Gost"));
    }
    /**
     * Upisivanje u bazu koji su komiteti prihvaceni od strane admina
     */
    public function acceptCommitteesAccept(){
          $request = $_POST['arguments'];
          $committeeModel = new \App\Models\CommitteeModel;
    
        foreach ($request as $IdUser) {
            $committeeModel->save([
                "IdUser" =>  $IdUser,
                "isApproved" => 1,
                      
            ]);
            
           
        }   
    }
     /**
      * Upisivanje u bazu koji su komiteti odbijeni od strane admina
      */
    public function acceptCommitteesDecline(){
        $request = $_POST['arguments'];
        $committeeModel = new \App\Models\CommitteeModel;      
        
        foreach ($request as $IdUser) {
            $committeeModel->save([
                "IdUser" =>  $IdUser,
                "isApproved" => 2,
                      
            ]);
           
        }
          
    }
    
}
