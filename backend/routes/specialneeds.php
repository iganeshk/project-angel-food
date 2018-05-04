<?php

// specialneeds endpoints
$router->get('/specialneed/{id}',['middleware' => 'auth', function($id) {
	return \App\SpecialNeed::where('specialNeedId', $id)->get();
}]);

$router->get('/specialneeds',['middleware' => 'auth', function () {
    return \App\SpecialNeed::all();
}]);
$router -> post('/specialneed',['middleware' => 'auth', function (\Illuminate\Http\Request $request){
	$specialNeedName = $request->json()->get('specialNeedName');
	
	$specialneed = new \App\SpecialNeed;
	$specialneed->specialNeedName = $specialNeedName;
	$specialneed->save();
    return response()->json(array('success' => true, 'specialneed' => $specialneed), 200);

}]);