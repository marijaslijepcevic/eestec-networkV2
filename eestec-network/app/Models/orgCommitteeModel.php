<?php
//Marija
namespace App\Models;

use CodeIgniter\Model;

class orgCommitteeModel extends Model
{
    protected $table      = 'organizingcommittee';
    protected $primaryKey = 'Id';

   
    protected $returnType     = 'object';
    //protected $useAutoIncrement = false;
    protected $allowedFields = ['IdEvent', 'IdUser'];

}