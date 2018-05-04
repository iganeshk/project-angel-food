<?php

// refer endpoints
$router->get('/refer/{id}',['middleware' => 'auth', function($id) {
	return \App\Refer::with('referType')->where('referId', $id)->get();
}]);

$router->get('/refers',['middleware' => 'auth', function () {
    return \App\Refer::with('referType')->get();
}]);
$router -> post('/refer',['middleware' => 'auth', function (\Illuminate\Http\Request $request){
	$referTypeData = $request->json()->get('referType');
	$referName= $request->json()->get('referName');
	$referPhone = $request->json()->get('referPhone');


	$referType = \App\ReferType::where('referTypeId', $referTypeData['referTypeId'])->firstOrFail();
	$refer = new \App\Refer;
	$refer->referName = $referName;
	$refer->referPhone = $referPhone;
	$refer->referTypeId = $referTypeData['referTypeId'];
	$refer->referType()->associate($referType)->save();
    return response()->json(array('success' => true, 'refer' => $refer), 200);
}]);