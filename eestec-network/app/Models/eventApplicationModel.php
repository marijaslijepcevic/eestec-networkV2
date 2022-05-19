<?php
namespace App\Models;

use CodeIgniter\Model;

class eventApplicationModel extends Model
{
    protected $table      = 'eventapplication';
    protected $primaryKey = 'IdEvent';

   
    protected $returnType     = 'object';
    protected $useAutoIncrement = false;
    protected $allowedFields = ['IdUser', 'motivationalLetter', 'isAccepted', 'dateOfAppl'];

}