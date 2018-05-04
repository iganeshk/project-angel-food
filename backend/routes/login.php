<?php

$router -> post('/login', function (\Illuminate\Http\Request $request){
	$username = $request->json()->get('username');
	$password = $request->json()->get('password');
    
     $user = \App\User::where('username', $username)->first();
     $dbPassword = $user->password;
     if ($dbPassword == sha1($password)) {
     	$token = sha1(time().$dbPassword);
     	$user->token = $token;
     	$user->save();
     	return response()->json(array('success' => true, 'token' => $token), 200);
     } else {
     	return response()->json(array('success' => false), 405);
     }

	});