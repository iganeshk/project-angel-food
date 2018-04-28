<?php

// sexual orientation endpoints
$router->get('/sexualorientation/{id}', function($id) {
	return \App\SexualOrientation::where('sexualOrientationTypeId', $id)->get();
});

$router->get('/sexualorientations', function () {
    return \App\SexualOrientation::all();
});
$router -> post('/sexualorientation', function (\Illuminate\Http\Request $request){
	$sexualOrientationTypeName = $request->json()->get('sexualOrientationTypeName');
	$sexualOrientation = new \App\SexualOrientation;
	$sexualOrientation->sexualOrientationTypeName = $sexualOrientationTypeName;
	
    $sexualOrientation->save();
    return response()->json(array('success' => true, 'sexualOrientation' => $sexualOrientation), 200);

});