<?php

//Jovan Dojcilovic

namespace App\Controllers;

use CodeIgniter\Test\ControllerTester;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Config\Factories;



class GostControllerTest extends CIUnitTestCase
{
	//use ControllerTester;
        use \CodeIgniter\Test\DatabaseTestTrait;
        use \CodeIgniter\Test\FeatureTestTrait;
        //use \App\Controllers\BaseController;

	public function setUp(): void
	{
		parent::setUp();
	}
        
        public function test_Gost_index(){		
            $results = $this->call('get', 'Gost/index');
            $results->assertSee('Username');
        }

        public function test_Gost_guestPage(){		
            $results = $this->call('get', 'Gost/guestPage');
            $results->assertSee('Spring Congress IMW - Belgrade');
        }

        public function test_Gost_eventReadMore(){		
            $results = $this->call('get', 'Gost/eventReadMore/28');
            $results->assertSee('Spring Congress IMW');
        }

        public function test_loginSubmit(){		
            $results = $this->call('get', 'Gost/loginSubmit');
            $results->assertSee('Username');
        }

        public function test_register(){		
            $results = $this->call('get', 'Gost/register');
            $results->assertSee('What are you?');
        }

        public function test_memberRegister(){		
            $results = $this->call('get', 'Gost/memberRegister');
            $results->assertSee('Email');
        }

        public function test_committeeRegister(){		
            $results = $this->call('get', 'Gost/committeeRegister');
            $results->assertSee('Email');
        }
        
        
        //DODAJE NOVOG REGUSERA 
        public function test_memberRegisterClick(){		
            $results = $this->call('get', 'Gost/memberRegisterClick', [
                "email" => 'email@gmail.com',
                "uname" => 'mojUsername',
                "psw" => '123',
                "pswRepeat" => '123',
                "fistname" => 'ime',
                "lastname" => 'prezime',
                "committee" => 'Belgrade',
                "picture" => null
            ]);
            
            $criteria = [
                'username' => 'mojUsername',
            ];
            $results->assertEquals(123, $this->grabFromDatabase('user', 'psw', $criteria));
        }

        
        //DODAJE NOVI KOMITET
        public function test_committeeRegisterClick(){		
            $results = $this->call('get', 'Gost/committeeRegisterClick', [
                "email" => 'noviemail@gmail.com',
                "uname" => 'mojUsernameKomitet',
                "psw" => '123',
                "pswRepeat" => '123',
                "comname" => 'Tampere',
                "university" => 'University of Tampere',
                "picture" => null,
                "type" => "LocalCommittee"
            ]);
            
            $criteria = [
                'username' => 'mojUsernameKomitet',
            ];
            $results->assertEquals(123, $this->grabFromDatabase('user', 'psw', $criteria));
        }
        
        
}

