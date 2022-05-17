<?php
//Marija
namespace App\Models;

use CodeIgniter\Model;

class committeeModel extends Model
{
    protected $table      = 'localcommittee';
    protected $primaryKey = 'IdUser';

   
    protected $returnType     = 'object';
  
    protected $allowedFields = ['committeeName', 'universityName', 'picture', 'type', 'isApproved'];

}