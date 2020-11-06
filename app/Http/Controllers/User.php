<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class User extends Controller
{
    function checkUser(Request $request)
    {
        try {
            $input = $request->only('username');
            if (!$request->exists('username')) {
                return response(['status' => false, 'message' => 'Error in the request'], 505);
            }

            $inputUser = strtolower($input['username']);

            $result = collect($this->getUsers())->map(function ($name) {
                return strtolower($name);
            })->contains($inputUser);

            return response(['status' => $result]);

        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }


    function getUsers()
    {
        return ['Alax', 'simpson', 'Max', 'Jude'];
    }

    function submitForm(Request $request){
        return  $request->all();
    }


}
