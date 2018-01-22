<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Model\AuthenticationModel;
use Illuminate\Http\Request;

class AuthenticationController extends BaseController
{
	private $model;

    public function __construct(AuthenticationModel $model = null)
    {
        if (is_null($model)) {
            $this->model = new AuthenticationModel();
        } else {
            $this->model = $model;
        }
    }

    public function login(Request $request)
    {
    	$result = [];
    	try {
    		$email = $request->input('email');
    		$password = $request->input('password');
    		$user = $this->model->getUser($email, $password);
    		if ($user) {
    			$result = [
    				'status' => 'OK',
    				'result' => ['access_token' => $user->access_token],
    				'errors' => []
    			];
    		}
    	} catch (\Exception $ex) {
    		
    	}
    	
    	return response()->json($result);
    }

    public function signup(Request $request)
    {
    	$result = [];
    	try {
    		$name = $request->input('name');
    		$email = $request->input('email');
    		$password = $this->hashMake($request->input('password'));

    		$user = $this->model->createUser($name, $email, $password);
    		if ($user) {
    			$result = [
    				'status' => 'OK',
    				'result' => [
    					'id' => $user,
    					'name' => $name,
    					'email' => $email,
    					'password_digest' => $password,
    					'created_at' => \date("Y-m-d H:i:s"),
    					'updated_at' => \date("Y-m-d H:i:s")
    				],
    				'errors' => []
    			];
    		}
    	} catch (\Exception $ex) {
    		
    	}
    	
    	return response()->json($result);
    }

    private function hashMake($input)
    {
    	return app('hash')->make($input);
    }
}