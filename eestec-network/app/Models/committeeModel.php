<?php
// Marija Slijepčević 0342/2019
namespace App\Models;

use CodeIgniter\Model;

class committeeModel extends Model
{
    protected $table      = 'localcommittee';
    protected $primaryKey = 'IdUser';

   
    protected $returnType     = 'object';
    protected $useAutoIncrement = false;
    protected $allowedFields = ['IdUser', 'committeeName', 'universityName', 'picture', 'type', 'isApproved', 'dateOfReg'];

}