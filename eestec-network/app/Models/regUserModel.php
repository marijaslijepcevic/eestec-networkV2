<?php
//Marija
namespace App\Models;

use CodeIgniter\Model;

class regUserModel extends Model
{
    protected $table      = 'reguser';
    protected $primaryKey = 'IdUser';

   
    protected $returnType     = 'object';
  
    protected $allowedFields = ['IdUserCom', 'name', 'surname', 'picture','isApproved'];

}