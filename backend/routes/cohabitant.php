<?php

// cohabitants endpoints
$router->get('/cohabitant/{id}',['middleware' => 'auth', function($id) {
	return \App\Cohabitant::where('cohabitantId', $id)->get();
}]);

$router->get('/cohabitants',['middleware' => 'auth', function () {
    return \App\Cohabitant::all();
}]);
$router -> post('/cohabitant',['middleware' => 'auth', function (\Illuminate\Http\Request $request){
	$cohabitantfirstname = $request->json()->get('cohabitantFirstName');
	$cohabitantlastname = $request->json()->get('cohabitantLastName');
	$cohabitantage = $request->json()->get('cohabitantAge');
	$relationship = $request->json()->get('relationship');
	$isCaretaker= $request->json()->get('isCaretaker');
	$mealRequired=$request->json()->get('mealRequired');

	$cohabitant = new \App\Cohabitant;
	$cohabitant->cohabitantFirstName = $cohabitantfirstname;
	$cohabitant->cohabitantLastName = $cohabitantlastname;
	$cohabitant->cohabitantAge = $cohabitantage;
	$cohabitant->relationship= $relationship;
	$cohabitant->isCaretaker=$isCaretaker;
	$cohabitant->mealRequired=$mealRequired;
	$cohabitant->save();
    return response()->json(array('success' => true, 'cohabitant' => $cohabitant), 200);

}]);