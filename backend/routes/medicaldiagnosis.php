<?php


// medical diagnosis endpoints
$router->get('/medicaldiagnosis/{id}', function($id) {
	return \App\MedicalDiagnosis::where('diagnosisId', $id)->get();
});

$router->get('/medicaldiagnosises', function () {
    return \App\MedicalDiagnosis::all();
});
$router -> post('/medicaldiagnosis', function (\Illuminate\Http\Request $request){
	$diagnosisName = $request->json()->get('diagnosisName');
	
	$medicaldiagnosis = new \App\MedicalDiagnosis;
	$medicaldiagnosis->diagnosisName = $diagnosisName;
	$medicaldiagnosis->save();
    return response()->json(array('success' => true, 'medicaldiagnosis' => $medicaldiagnosis), 200);

});
