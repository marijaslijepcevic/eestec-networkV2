<?php
// Marija Slijepčević 0342/2019
namespace App\Models;

use CodeIgniter\Model;

class regUserModel extends Model
{
    protected $table      = 'reguser';
    protected $primaryKey = 'IdUser';

   
    protected $returnType     = 'object';
    protected $useAutoIncrement = false;

    protected $allowedFields = ['IdUser','IdUserCom', 'name', 'surname', 'picture','isApproved', 'dateOfReg'];

}