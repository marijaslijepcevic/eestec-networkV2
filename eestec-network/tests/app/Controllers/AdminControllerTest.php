<?php
namespace App\Controllers;

use CodeIgniter\Test\ControllerTester;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Config\Factories;



class AdminControllerTest extends CIUnitTestCase
{
	//use ControllerTester;
        use \CodeIgniter\Test\DatabaseTestTrait;
        use \CodeIgniter\Test\FeatureTestTrait;
        //use \App\Controllers\BaseController;


	public function setUp(): void
	{
		parent::setUp();
	}


	public function test_Admin_index(){		
            $adminModel = new \App\Models\adminModel();
            $userModel = new \App\Models\userModel();
            $admin = $adminModel->where('IdUser', 1)->first();
            $user = $userModel->where('username', 'admin')->first();
            $this->session['admin'] = $admin;
            $this->session['user'] = $user;
            $results = $this->call('get', 'Admin/index');
            $results->assertSee('June, the Tenthest (I)MW - Munich');
	}
        
        public function test_Admin_acceptEvents(){
            $adminModel = new \App\Models\adminModel();
            $userModel = new \App\Models\userModel();
            $admin = $adminModel->where('IdUser', 1)->first();
            $user = $userModel->where('username', 'admin')->first();
            $this->session['admin'] = $admin;
            $this->session['user'] = $user;
            $results = $this->call('get', 'Admin/acceptEvents');
            $results->assertSee('June, the Tenthest (I)MW - Munich');
        }

        public function test_Admin_deleteEvents(){
	    $adminModel = new \App\Models\adminModel();
            $userModel = new \App\Models\userModel();
            $admin = $adminModel->where('IdUser', 1)->first();
            $user = $userModel->where('username', 'admin')->first();
            $this->session['admin'] = $admin;
            $this->session['user'] = $user;
            $results = $this->call('get', 'Admin/deleteEvents');
            $results->assertSee('Spring Congress IMW - Belgrade');
        }

        public function test_Admin_acceptCommittees(){
	    $adminModel = new \App\Models\adminModel();
            $userModel = new \App\Models\userModel();
            $admin = $adminModel->where('IdUser', 1)->first();
            $user = $userModel->where('username', 'admin')->first();
            $this->session['admin'] = $admin;
            $this->session['user'] = $user;
            $results = $this->call('get', 'Admin/acceptCommittees');
            $results->assertSee('List of Committees');
        }

        public function test_Admin_eventReadMore(){
	      $adminModel = new \App\Models\adminModel();
            $userModel = new \App\Models\userModel();
            $admin = $adminModel->where('IdUser', 1)->first();
            $user = $userModel->where('username', 'admin')->first();
            $this->session['admin'] = $admin;
            $this->session['user'] = $user;
            $results = $this->call('get', 'Admin/eventReadMore/30/1');
            $results->assertSee('Back');
        }
        
        //EVENT 32 postaje prihvacen
        public function test_Admin_acceptEventsAccept(){
	    $adminModel = new \App\Models\adminModel();
            $userModel = new \App\Models\userModel();
            $admin = $adminModel->where('IdUser', 1)->first();
            $user = $userModel->where('username', 'admin')->first();
            $this->session['admin'] = $admin;
            $this->session['user'] = $user;
            $results = $this->call('get', 'Admin/acceptEvents/32/1');
            $results->assertSee('Event accpeted');
        }
        
        //EVENT 30 postaje odbijen
        public function test_Admin_acceptEventsDecline(){
	    $adminModel = new \App\Models\adminModel();
            $userModel = new \App\Models\userModel();
            $admin = $adminModel->where('IdUser', 1)->first();
            $user = $userModel->where('username', 'admin')->first();
            $this->session['admin'] = $admin;
            $this->session['user'] = $user;
            $results = $this->call('get', 'Admin/acceptEvents/30/2');
            $results->assertSee('Event declined');
        }
        
        public function test_Admin_logout(){
	    $adminModel = new \App\Models\adminModel();
            $userModel = new \App\Models\userModel();
            $admin = $adminModel->where('IdUser', 1)->first();
            $user = $userModel->where('username', 'admin')->first();
            $this->session['admin'] = $admin;
            $this->session['user'] = $user;
            $results = $this->call('get', 'Admin/logout');
            $results->assertRedirect('Gost');
        }
        
        //PRIHVATA Komitet 34
        public function test_Admin_acceptCommitteesAccept(){
	    $adminModel = new \App\Models\adminModel();
            $userModel = new \App\Models\userModel();
            $admin = $adminModel->where('IdUser', 1)->first();
            $user = $userModel->where('username', 'admin')->first();
            $this->session['admin'] = $admin;
            $this->session['user'] = $user;
            $_POST['arguments'] = [34];
            $results = $this->call('get', 'Admin/acceptCommitteesAccept');
            $criteria = [
                'IdUser' => 34,
            ];
            $results->assertEquals(1, $this->grabFromDatabase('localcommittee', 'isApproved', $criteria));
        }   
        //ODBIJA Komitet 35
        public function test_Admin_acceptCommitteesDecline(){
	    $adminModel = new \App\Models\adminModel();
            $userModel = new \App\Models\userModel();
            $admin = $adminModel->where('IdUser', 1)->first();
            $user = $userModel->where('username', 'admin')->first();
            $this->session['admin'] = $admin;
            $this->session['user'] = $user;
            $_POST['arguments'] = [35];
            $results = $this->call('get', 'Admin/acceptCommitteesDecline');
            $criteria = [
                'IdUser' => 35,
            ];
            $results->assertEquals(2, $this->grabFromDatabase('localcommittee', 'isApproved', $criteria));
        }
        
        
}

