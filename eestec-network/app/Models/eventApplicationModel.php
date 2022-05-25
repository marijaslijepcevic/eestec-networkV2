<?php
// Marija Slijepčević 0342/2019
namespace App\Models;

use CodeIgniter\Model;
/**
 * eventApplicationModel - model za bazu sa prijavljenim clanovima udruzenja za odredjeni dogadjaj
 */
class eventApplicationModel extends Model
{
    protected $table      = 'eventapplication';
    protected $primaryKey = 'id';

   
    protected $returnType     = 'object';
    protected $useAutoIncrement = false;
    protected $allowedFields = ['id','IdEvent', 'IdUser', 'motivationalLetter', 'isAccepted', 'dateOfAppl'];

}