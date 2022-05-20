<?php
namespace App\Models;

use CodeIgniter\Model;

class eventApplicationModel extends Model
{
    protected $table      = 'eventapplication';
    protected $primaryKey = 'id';

   
    protected $returnType     = 'object';
    //protected $useAutoIncrement = false;
    protected $allowedFields = ['IdEvent', 'IdUser', 'motivationalLetter', 'isAccepted', 'dateOfAppl'];

}