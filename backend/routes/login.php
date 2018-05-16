<?php

$router -> post('/login', function (\Illuminate\Http\Request $request){
     $username = $request->json()->get('username');
     $password = $request->json()->get('password');
    
     $user = \App\User::where('username', $username)->first();
     $dbPassword = $user->password;
     if ($dbPassword == sha1($password) && $user->active == 1) {
          $token = sha1(time().$dbPassword);
          $name = ($user->fname.' '.$user->lname);
          $user->token = $token;
          $user->save();
          return response()->json(array('success' => true, 'token' => $token, 'name' => $name, 'clientType' => $user->userTypeId, 'disabled' => false), 200);
     } else if ($user->active == 0 && $dbPassword == sha1($password))  {
          return response()->json(array('success' => true, 'disabled' => true, 'message' => "account disabled"), 200);
     } else {
          return response()->json(array('success' => false), 405);
     }

     });