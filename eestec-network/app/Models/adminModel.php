<?php
// Marija Slijepčević 0342/2019

/**
 * AdminModel - model za admin bazu
 */
namespace App\Models;

use CodeIgniter\Model;

class adminModel extends Model
{
    protected $table      = 'admin';
    protected $primaryKey = 'IdUser';

   
    protected $returnType     = 'object';
  

}