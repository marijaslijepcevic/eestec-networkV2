<?php
// Marija Slijepčević 0342/2019
namespace App\Models;

use CodeIgniter\Model;

/**
 * AdminModel - model za admin bazu
 */
class adminModel extends Model
{

    protected $table      = 'admin';
    protected $primaryKey = 'IdUser';

   
    protected $returnType     = 'object';
  

}