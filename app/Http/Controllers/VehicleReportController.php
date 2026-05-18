<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleReport;
use Illuminate\Support\Facades\Http;

class VehicleReportController extends Controller
{
    public function index()
{
    $reports = VehicleReport::where('user_id', auth()->id())
        ->latest()
        ->get();

    return view('vehicle-reports.index', compact('reports'));
}

public function store(Request $request)
{
    $request->validate([
        'vin' => 'required|string|min:11|max:17',
    ]);

    $vin = strtoupper($request->vin);

    $response = Http::get("https://vpic.nhtsa.dot.gov/api/vehicles/DecodeVin/$vin?format=json");

    $data = $response->json();

    $brand = null;
    $model = null;
    $year = null;
    $vehicleType = null;
    $country = null;
    $engine = null;
    $airbags = null;

    foreach ($data['Results'] as $item) {

        if ($item['Variable'] === 'Make') {
            $brand = $item['Value'];
        }

        if ($item['Variable'] === 'Model') {
            $model = $item['Value'];
        }

        if ($item['Variable'] === 'Model Year') {
            $year = $item['Value'];
        }

        if ($item['Variable'] === 'Vehicle Type') {
            $vehicleType = $item['Value'];
        }

        if ($item['Variable'] === 'Plant Country') {
            $country = $item['Value'];
        }

        if ($item['Variable'] === 'Engine Model') {
            $engine = $item['Value'];
        }

        if ($item['Variable'] === 'Air Bag Loc Front') {
            $airbags = $item['Value'];
        }
    }

    VehicleReport::create([
        'user_id' => auth()->id(),
        'vin' => $vin,
        'brand' => $brand,
        'model' => $model,
        'year' => $year,
        'report_type' => 'basic',
        'report_result' => json_encode([
        'full_api_response' => $data,
        'vehicle_type' => $vehicleType,
        'country' => $country,
        'engine' => $engine,
        'airbags' => $airbags,
        'accidents' => rand(0, 3),
        'recall' => rand(0, 1) ? 'Sí' : 'No',
        'stolen' => rand(0, 1) ? 'No' : 'Sí',
        'score' => rand(70, 100)
]),
    ]);

    return redirect()->route('vin.search')
        ->with('success', 'Reporte generado correctamente');
}

public function show($id)
{
    $report = VehicleReport::findOrFail($id);

    return view('vehicle-reports.show', compact('report'));
}

}
