<?php

namespace App\Http\Controllers;

use App\Models\Passport;
use Illuminate\Http\Request;

class PassportController extends Controller
{
    public function getPassports(Request $request)
    {
        $data = Passport::where('name', 'LIKE','%'.$request->keyword.'%')->get();
        return response()->json($data);
    }
}
