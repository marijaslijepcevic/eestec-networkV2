<?php
//Marija
namespace App\Models;

use CodeIgniter\Model;

class userModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'IdUser';

   
    protected $returnType     = 'object';
  
    protected $allowedFields = ['username', 'psw', 'email'];

}