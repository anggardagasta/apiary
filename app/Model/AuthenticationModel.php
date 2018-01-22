<?php

namespace App\Model;

class AuthenticationModel
{
	public function getUser($email, $password)
	{
		try {
			// return DB::select("SELECT * FROM users");
            $user = \DB::table('users')
            		->where('email', '=', $email)
            		->where('password', '=', $password)
            		->first();

            return $user;
        } catch (\Exception $ex) {
            throw $ex;
        }
	}

	public function createUser($name, $email, $password)
	{
		try {
			$field['name'] = $name;
			$field['email'] = $email;
			$field['password'] = $password;
			$field['access_token'] = $password;
			$field['created_at'] = \date("Y-m-d H:i:s");
            $field['updated_at'] = \date("Y-m-d H:i:s");  
            return \DB::table('users')->insertGetId($field);
		} catch (\Exception $ex) {
            throw $ex;
        }
	}
}