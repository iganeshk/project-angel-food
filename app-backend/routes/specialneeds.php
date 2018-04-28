<?php

// specialneeds endpoints
$router->get('/specialneed/{id}', function($id) {
	return \App\SpecialNeed::where('specialNeedId', $id)->get();
});

$router->get('/specialneeds', function () {
    return \App\SpecialNeed::all();
});
$router -> post('/specialneed', function (\Illuminate\Http\Request $request){
	$specialNeedName = $request->json()->get('specialNeedName');
	
	$specialneed = new \App\SpecialNeed;
	$specialneed->specialNeedName = $specialNeedName;
	$specialneed->save();
    return response()->json(array('success' => true, 'specialneed' => $specialneed), 200);

});