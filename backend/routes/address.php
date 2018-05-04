<?php


// address endpoints
$router->get('/addresses',['middleware' => 'auth', function () {
    return \App\Address::all();
}]);

$router->get('/address/{id}',['middleware' => 'auth', function ($id) {
    return \App\Address::where('addressId', $id)->get();
}]);

$router->post('/address',['middleware' => 'auth', function (\Illuminate\Http\Request $request) {
	$a_line1 = $request->json()->get('a_line1');
	$a_line2 = $request->json()->get('a_line2');
	$city    = $request->json()->get('city');
	$state   = $request->json()->get('state');
	$zip     = $request->json()->get('zip');

	$address          = new \App\Address;
	$address->addrLine1 = $a_line1;
	$address->addrLine2 = $a_line2;
	$address->city    = $city;
	$address->state   = $state;
	$address->zip     = $zip;
	$address->save();
	return response()->json(array('success' => true, 'address' => $address), 200);
}]);
