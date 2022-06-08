<?php
//Marija Slijepcevic 342/19
namespace App\Controllers;

use CodeIgniter\Test\ControllerTester;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Config\Factories;



class CommitteeControllerTest extends CIUnitTestCase
{
	//use ControllerTester;
        use \CodeIgniter\Test\DatabaseTestTrait;
        use \CodeIgniter\Test\FeatureTestTrait;
        //use \App\Controllers\BaseController;

	public function setUp(): void
	{
		parent::setUp();
	}
        
        public function test_Committee_index(){
            $committeeModel = new \App\Models\committeeModel();
            $userModel = new \App\Models\userModel();
            $committee = $committeeModel->where('IdUser', 20)->first();
            $user = $userModel->where('username', 'lcBelgrade')->first();
            $this->session['committee'] = $committee;
            $this->session['user'] = $user;
            $results = $this->call('get', 'LocalCommittee/index');
            $results->assertSee('Read more');
        }

        public function test_Committee_viewEvents(){
            $committeeModel = new \App\Models\committeeModel();
            $userModel = new \App\Models\userModel();
            $committee = $committeeModel->where('IdUser', 20)->first();
            $user = $userModel->where('username', 'lcBelgrade')->first();
            $this->session['committee'] = $committee;
            $this->session['user'] = $user;
            $results = $this->call('get', 'LocalCommittee/viewEvents');
            $results->assertSee('Read more');
        }

        public function test_Committee_acceptMembers(){
            $committeeModel = new \App\Models\committeeModel();
            $userModel = new \App\Models\userModel();
            $committee = $committeeModel->where('IdUser', 20)->first();
            $user = $userModel->where('username', 'lcBelgrade')->first();
            $this->session['committee'] = $committee;
            $this->session['user'] = $user;
            $results = $this->call('get', 'LocalCommittee/acceptMembers');
            $results->assertSee('List of Members');
        }
        public function test_Committee_publishEvents(){
            $committeeModel = new \App\Models\committeeModel();
            $userModel = new \App\Models\userModel();
            $committee = $committeeModel->where('IdUser', 20)->first();
            $user = $userModel->where('username', 'lcBelgrade')->first();
            $this->session['committee'] = $committee;
            $this->session['user'] = $user;
            $results = $this->call('get', 'LocalCommittee/publishEvents');
            $results->assertSee('Publish Event');
        }
        public function test_Committee_changeInfo(){
            $committeeModel = new \App\Models\committeeModel();
            $userModel = new \App\Models\userModel();
            $committee = $committeeModel->where('IdUser', 20)->first();
            $user = $userModel->where('username', 'lcBelgrade')->first();
            $this->session['committee'] = $committee;
            $this->session['user'] = $user;
            $results = $this->call('get', 'LocalCommittee/changeInfo');
            $results->assertSee('Change Info');
        }

        public function test_Committee_logout(){
            $committeeModel = new \App\Models\committeeModel();
            $userModel = new \App\Models\userModel();
            $committee = $committeeModel->where('IdUser', 20)->first();
            $user = $userModel->where('username', 'lcBelgrade')->first();
            $this->session['committee'] = $committee;
            $this->session['user'] = $user;
            $results = $this->call('get', 'LocalCommittee/logout');
            $results->assertRedirect('Gost');
        }

        public function test_Committee_changeInfoClick(){
            $committeeModel = new \App\Models\committeeModel();
            $userModel = new \App\Models\userModel();
            $committee = $committeeModel->where('IdUser', 20)->first();
            $user = $userModel->where('username', 'lcBelgrade')->first();
            $this->session['committee'] = $committee;
            $this->session['user'] = $user;
            $results = $this->call('get', 'LocalCommittee/changeInfoClick');
            $results->assertSee('Change Info');
        }   
        
        //PRIHVATA Usera 38
        public function test_Committee_acceptMembersAccept(){
            $committeeModel = new \App\Models\committeeModel();
            $userModel = new \App\Models\userModel();
            $committee = $committeeModel->where('IdUser', 20)->first();
            $user = $userModel->where('username', 'lcBelgrade')->first();
            $this->session['committee'] = $committee;
            $this->session['user'] = $user;
            $_POST['arguments'] = [38];
            $results = $this->call('get', 'LocalCommittee/acceptMembersAccept');
            $criteria = [
                'IdUser' => 38,
            ];
            $results->assertEquals(1, $this->grabFromDatabase('reguser', 'isApproved', $criteria));
        }
        
        //ODBIJA Usera 37
        public function test_Committee_acceptMembersDecline(){
            $committeeModel = new \App\Models\committeeModel();
            $userModel = new \App\Models\userModel();
            $committee = $committeeModel->where('IdUser', 20)->first();
            $user = $userModel->where('username', 'lcBelgrade')->first();
            $this->session['committee'] = $committee;
            $this->session['user'] = $user;
            $_POST['arguments'] = [37];
            $results = $this->call('get', 'LocalCommittee/acceptMembersDecline');
            $criteria = [
                'IdUser' => 37,
            ];
            $results->assertEquals(2, $this->grabFromDatabase('reguser', 'isApproved', $criteria));
        }

        public function test_Committee_eventReadMore(){
            $committeeModel = new \App\Models\committeeModel();
            $userModel = new \App\Models\userModel();
            $committee = $committeeModel->where('IdUser', 20)->first();
            $user = $userModel->where('username', 'lcBelgrade')->first();
            $this->session['committee'] = $committee;
            $this->session['user'] = $user;
            $results = $this->call('get', 'LocalCommittee/eventReadMore/28/3');
            $results->assertSee('Back');
        }
        
        public function test_Committee_acceptParticipants(){
            $committeeModel = new \App\Models\committeeModel();
            $userModel = new \App\Models\userModel();
            $committee = $committeeModel->where('IdUser', 20)->first();
            $user = $userModel->where('username', 'lcBelgrade')->first();
            $this->session['committee'] = $committee;
            $this->session['user'] = $user;
            $results = $this->call('get', 'LocalCommittee/acceptParticipants/31');
            $results->assertSee('Accept');
        }
        //PRIHVATA Participante za dogadjaj 31
        public function test_Committee_acceptParticipantsAccept(){
            $committeeModel = new \App\Models\committeeModel();
            $userModel = new \App\Models\userModel();
            $committee = $committeeModel->where('IdUser', 20)->first();
            $user = $userModel->where('username', 'lcBelgrade')->first();
            $this->session['committee'] = $committee;
            $this->session['user'] = $user;
            $_POST['arguments'] = [21, 1];
            $results = $this->call('get', 'LocalCommittee/acceptParticipantsAccept/31');
            $criteria = [
                'IdUser' => 21,
            ];
            $results->assertEquals(1, $this->grabFromDatabase('eventapplication', 'isAccepted', $criteria));
        }
        //Zavrsava odabir za dogadjaj 35
        public function test_Committee_acceptParticipantsFinish(){
            $committeeModel = new \App\Models\committeeModel();
            $userModel = new \App\Models\userModel();
            $committee = $committeeModel->where('IdUser', 20)->first();
            $user = $userModel->where('username', 'lcBelgrade')->first();
            $this->session['committee'] = $committee;
            $this->session['user'] = $user;
            $results = $this->call('get', 'LocalCommittee/acceptParticipantsFinish/35');
            $criteria = [
                'IdEvent' => 35,
            ];
            $results->assertEquals(1, $this->grabFromDatabase('event', 'finishedSelection', $criteria));
        }

        public function test_Committee_motivationalLetterclick(){
            $committeeModel = new \App\Models\committeeModel();
            $userModel = new \App\Models\userModel();
            $committee = $committeeModel->where('IdUser', 20)->first();
            $user = $userModel->where('username', 'lcBelgrade')->first();
            $this->session['committee'] = $committee;
            $this->session['user'] = $user;
            $results = $this->call('get', 'LocalCommittee/motivationalLetterclick/31/21');
            $results->assertSee('Motivational letter');
        }
                
        //ZATVARA PRIJAVE ZA HOW TO WORK
        public function test_Committee_closeApplications(){
            $committeeModel = new \App\Models\committeeModel();
            $userModel = new \App\Models\userModel();
            $committee = $committeeModel->where('IdUser', 20)->first();
            $user = $userModel->where('username', 'lcBelgrade')->first();
            $this->session['committee'] = $committee;
            $this->session['user'] = $user;
            $results = $this->call('get', 'LocalCommittee/closeApplications/31');
            $results->assertSee('How to work 24/7 - Belgrade');
        }

        
}

