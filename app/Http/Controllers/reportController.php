<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Models\insurance;
class reportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $docs = DB::table('insurances')->whereDate('createDate', '>=', $request->get('date'))->get();
            $books = [
                ['№з/п', 'Серія', 'Номер', 'Дата укладення', 'Дата початку', 'Дата закінчення', 'К-сть днів', 'Франшиза', 'Програма', 'Країна пребування', 'Страхувальник/Застрахована особа', 'Паспорт', 'Дата народження', 'Страхова сума МВ', 'ВАЛЮТА страхової суми', 'Премія МВ, грн.']];

            foreach ($docs as $doc) {
                if($doc->login === Auth::user()->name){
                    $arr = [];
                    array_push($arr,
                        $doc->id,
                        'ВЗК',
                        $doc->polNumber,
                        $doc->createDate,
                        $doc->startdate,
                        'TODO',
                        $doc->days,
                        $doc->fran,
                        $doc->type,
                        \Illuminate\Support\Facades\DB::table('clients')->where('passportNumber', 'LIKE', '%' . $doc->passportNumber . '%')->get()[0]->country,
                        \Illuminate\Support\Facades\DB::table('clients')->where('passportNumber', 'LIKE', '%' . $doc->passportNumber . '%')->get()[0]->giverName . ' ' . \Illuminate\Support\Facades\DB::table('clients')->where('passportNumber', 'LIKE', '%' . $doc->passportNumber . '%')->get()[0]->giverLastName,
                        $doc->passportNumber,
                        \Illuminate\Support\Facades\DB::table('clients')->where('passportNumber', 'LIKE', '%' . $doc->passportNumber . '%')->get()[0]->birthday,
                        $doc->summ,
                        'EUR',
                        $doc->prem,
                    );
                    array_push($books, $arr);
                }
            }
            return (new FastExcel($books))->download('file.xlsx');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
