<?php
// Sava Andrić 0365/2019

/**
 * EventModel - model za bazu dogadjaja u udruzenju
 */
namespace App\Models;

use CodeIgniter\Model;

class eventModel extends Model
{
    protected $table      = 'event';
    protected $primaryKey = 'IdEvent';

   
    protected $returnType     = 'object';
  
    protected $allowedFields = ['eventName', 'type', 'description', 'numOfParticipants', 'picture', 'isActive', 'openApplications', 'isApproved', 'IdEventCom', 'finishedSelection', 'dateStart', 'dateEnd', 'numOfAcc'];

}