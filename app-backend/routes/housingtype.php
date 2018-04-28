<?php



// housing type endpoints
$router->get('/housingtype/{id}', function($id) {
	return \App\HousingType::where('housingTypeId', $id)->get();
});

$router->get('/housingtypes', function () {
    return \App\HousingType::all();
});
$router -> post('/housingtype', function (\Illuminate\Http\Request $request){
	$housingTypeName = $request->json()->get('housingTypeName');
	
	$housingtype = new \App\HousingType;
	$housingtype->housingTypeName = $housingTypeName;
	$housingtype->save();
    return response()->json(array('success' => true, 'housingtype' => $housingtype), 200);

});