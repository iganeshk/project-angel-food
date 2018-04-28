<?php


// race endpoints
$router->get('/race/{id}', function($id) {
	return \App\Race::where('raceTypeId', $id)->get();
});

$router->get('/races', function () {
    return \App\Race::all();
});
$router -> post('/race', function (\Illuminate\Http\Request $request){
	$raceTypeName = $request->json()->get('raceTypeName');
	
	$race = new \App\Race;
	$race->raceTypeName = $raceTypeName;
	
    $race->save();
    return response()->json(array('success' => true, 'race' => $race), 200);

});