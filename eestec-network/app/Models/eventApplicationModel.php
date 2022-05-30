<?php
// Marija Slijepčević 0342/2019

/**
 * eventApplicationModel - model za bazu sa prijavljenim clanovima udruzenja za odredjeni dogadjaj
 */
namespace App\Models;

use CodeIgniter\Model;

class eventApplicationModel extends Model
{
    protected $table      = 'eventapplication';
    protected $primaryKey = 'id';

   
    protected $returnType     = 'object';
    protected $useAutoIncrement = false;
    protected $allowedFields = ['id','IdEvent', 'IdUser', 'motivationalLetter', 'isAccepted', 'dateOfAppl'];

}