<?php
// Marija Slijepčević 0342/2019
namespace App\Models;

use CodeIgniter\Model;
//predstavlja model korisnika iz baze
class userModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'IdUser';

   
    protected $returnType     = 'object';
  
    protected $allowedFields = ['username', 'psw', 'email'];

}