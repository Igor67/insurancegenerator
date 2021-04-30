<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\insurance;
use App\Models\clients;
use App\Models\firms;
class InsuranceController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function getUsers(Request $request)
    {

        $data = clients::where('passportNumber', 'LIKE','%'.$request->passportNumber.'%')->get();
        return response()->json($data);
    }
    public function getInsurances(Request $request)
    {

        $data = insurance::where('polNumber', 'LIKE','%'.$request->polNumber.'%')->get();
        return response()->json($data);
    }
    public function getFirms(Request $request)
    {

        $data = firms::where('firm', 'LIKE','%'.$request->firm.'%')->get();
        return response()->json($data);
    }
    public function printBill(Request $request)
    {

        return view('insurance.print.check', compact('request'));
    }
}
