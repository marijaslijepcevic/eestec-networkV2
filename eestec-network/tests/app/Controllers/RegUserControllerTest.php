<?php

//Jovan Dojcilovic

namespace App\Controllers;

use CodeIgniter\Test\ControllerTester;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Config\Factories;



class RegUserControllerTest extends CIUnitTestCase
{
	//use ControllerTester;
        use \CodeIgniter\Test\DatabaseTestTrait;
        use \CodeIgniter\Test\FeatureTestTrait;
        //use \App\Controllers\BaseController;

	public function setUp(): void
	{
		parent::setUp();
	}
        
        public function test_RegUser_eventReadMore(){
            $regUserModel = new \App\Models\regUserModel();
            $userModel = new \App\Models\userModel();
            $regUser = $regUserModel->where('IdUser', 29)->first();
            $user = $userModel->where('username', 'hananovak')->first();
            $this->session['reguser'] = $regUser;
            $this->session['user'] = $user;
            $results = $this->call('get', 'RegUser/eventReadMore/28');
            $results->assertSee('Back');
        }


        public function test_RegUser_index(){
            $regUserModel = new \App\Models\regUserModel();
            $userModel = new \App\Models\userModel();
            $regUser = $regUserModel->where('IdUser', 29)->first();
            $user = $userModel->where('username', 'hananovak')->first();
            $this->session['reguser'] = $regUser;
            $this->session['user'] = $user;
            $results = $this->call('get', 'RegUser/index');
            $results->assertSee('Read more');
        }

        public function test_RegUser_viewEvents(){
            $regUserModel = new \App\Models\regUserModel();
            $userModel = new \App\Models\userModel();
            $regUser = $regUserModel->where('IdUser', 29)->first();
            $user = $userModel->where('username', 'hananovak')->first();
            $this->session['reguser'] = $regUser;
            $this->session['user'] = $user;
            $results = $this->call('get', 'RegUser/viewEvents');
            $results->assertSee('Read more');
        }

        public function test_RegUser_changeInfoClick(){
            $regUserModel = new \App\Models\regUserModel();
            $userModel = new \App\Models\userModel();
            $regUser = $regUserModel->where('IdUser', 29)->first();
            $user = $userModel->where('username', 'hananovak')->first();
            $this->session['reguser'] = $regUser;
            $this->session['user'] = $user;
            $results = $this->call('get', 'RegUser/changeInfoClick');
            $results->assertSee('Change Info');
        }

        public function test_RegUser_logout(){
            $regUserModel = new \App\Models\regUserModel();
            $userModel = new \App\Models\userModel();
            $regUser = $regUserModel->where('IdUser', 29)->first();
            $user = $userModel->where('username', 'hananovak')->first();
            $this->session['reguser'] = $regUser;
            $this->session['user'] = $user;
            $results = $this->call('get', 'RegUser/logout');
            $results->assertRedirect('Gost');
        }

        public function test_RegUser_changeInfo(){
            $regUserModel = new \App\Models\regUserModel();
            $userModel = new \App\Models\userModel();
            $regUser = $regUserModel->where('IdUser', 29)->first();
            $user = $userModel->where('username', 'hananovak')->first();
            $this->session['reguser'] = $regUser;
            $this->session['user'] = $user;
            $results = $this->call('get', 'RegUser/changeInfo');
            $results->assertSee('Change Info');
        }

        public function test_RegUser_apply(){
            $regUserModel = new \App\Models\regUserModel();
            $userModel = new \App\Models\userModel();
            $regUser = $regUserModel->where('IdUser', 29)->first();
            $user = $userModel->where('username', 'hananovak')->first();
            $this->session['reguser'] = $regUser;
            $this->session['user'] = $user;
            $results = $this->call('get', 'RegUser/apply/29');
            $criteria = [
                'IdUser' => 29,
                'IdEvent' => 29
            ];
            $results->assertEquals(0, $this->grabFromDatabase('eventapplication', 'isAccepted', $criteria));
        }
        
        //OSOBA 29 se prijavljuje za dogadjaj 29 sa motivacionim pismom 29
        public function test_RegUser_submitMotivationalLetter(){
            $regUserModel = new \App\Models\regUserModel();
            $userModel = new \App\Models\userModel();
            $regUser = $regUserModel->where('IdUser', 29)->first();
            $user = $userModel->where('username', 'hananovak')->first();
            $this->session['reguser'] = $regUser;
            $this->session['user'] = $user;
            $_POST['arguments'] = [29];
            $results = $this->call('get', 'RegUser/submitMotivationalLetter/29');
            $criteria = [
                'IdUser' => 29,
                'IdEvent' => 29
            ];
            $results->assertEquals('29', $this->grabFromDatabase('eventapplication', 'motivationalLetter', $criteria));
        }
        
}

