<?php

namespace App\Http\Controllers\Frontsite;

use App\Http\Controllers\Controller;

use App\Models\MasterData\CategoryComplaint;
use App\Models\MasterData\Districts;
use App\Models\MasterData\Provinces;
use App\Models\MasterData\Regencies;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $province = Provinces::all()->pluck('name', 'id');
        
        $category_complaint = CategoryComplaint::all()->pluck('name', 'id');

        return view('pages.frontsite.home', compact('province', 'category_complaint'));
    }

    public function select_regency_report($id)
    {
        // checking & validation
        $id = isset($id) ? $id : 0;

        // get data
        $regency['data'] = Regencies::where('province_id', $id)->orderBy('name', 'asc')->get();

        return response()->json($regency);

    }

    public function select_district_report($id)
    {
        // checking & validation
        $id = isset($id) ? $id : 0;

        // get data
        $district['data'] = Districts::where('regency_id', $id)->orderBy('name', 'asc')->get();

        return response()->json($district);
    }
}
