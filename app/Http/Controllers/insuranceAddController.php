<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\insurance;
use App\Models\firms;
use App\Models\clients;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Models\User;

class insuranceAddController extends Controller
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
     * @return string
     */
    public function create()
    {
        if (\Illuminate\Support\Facades\Auth::check()) {
            return view('insurance/create');
        } else {
            return 'Ты кто такой?';
        }
    }

    public function previewPeople()
    {
        if (\Illuminate\Support\Facades\Auth::check()) {
            $people = DB::table('clients')->get();
            return view('insurance/people/preview', compact('people'));
        } else {
            return 'Ты кто такой?';
        }
    }

    public function previewFirms()
    {
        if (\Illuminate\Support\Facades\Auth::check()) {
            $firms = DB::table('firms')->get();
            return view('insurance/firms/preview', compact('firms'));
        } else {
            return 'Ты кто такой?';
        }
    }

    public function previewDocs()
    {
        if (\Illuminate\Support\Facades\Auth::check()) {
            $docs = DB::table('insurances')->where('login', 'LIKE', '%' . Auth::user()->name . '%')->get();
            return view('insurance/docs/preview', compact('docs'));
        } else {
            return 'Ты кто такой?';
        }
    }

    public function print()
    {
        $docs = DB::table('insurances')->where('login', 'LIKE', '%' . Auth::user()->name . '%')->get();
        $books = [
            ['№з/п', 'Серія', 'Номер', 'Дата укладення', 'Дата початку', 'Дата закінчення', 'К-сть днів', 'Франшиза', 'Програма', 'Країна пребування', 'Страхувальник/Застрахована особа', 'Паспорт', 'Дата народження', 'Страхова сума МВ', 'ВАЛЮТА страхової суми', 'Премія МВ, грн.']];

        foreach ($docs as $doc) {
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
        return (new FastExcel($books))->download('file.xlsx');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->get('printFlag') != '2') {
            $login = \Illuminate\Support\Facades\Auth::user()->name;
            $start = $request->get('startdate');
            $end = date('Y-m-d', strtotime($start . ' + ' . $request->get('days') . ' days'));
            $insurance = new insurance([
                'passportNumber' => $request->get('passportNumber'),
                'home' => $request->get('home'),
                'days' => $request->get('days'),
                'login' => $login,
                'startdate' => $request->get('startdate'),
                'prem' => $request->get('prem'),
                'enddate' => $end,
                'summ' => $request->get('summ'),
                'fran' => $request->get('fran'),
                'polNumber' => $request->get('polNumber'),
                'type' => $request->get('type'),
                'createDate' => $request->get('createDate'),

            ]);
            $insurance->save();
            $firms = firms::where('firm', 'LIKE', '%' . $request->get('firm') . '%')->get();
            if ($firms == '[]') {
                $firm = new firms([
                    'firm' => $request->get('firm'),
                    'firmBody' => $request->get('firmBody'),
                    'electronicNumber' => $request->get('electronicNumber'),
                ]);
            } else {
                $firm = firms::find($firms[0]->id);
                $firm->firm = $request->get('firm');
                $firm->firmBody = $request->get('firmBody');
                $firm->electronicNumber = $request->get('electronicNumber');
            }

            $firm->save();
            $data = clients::where('passportNumber', 'LIKE', '%' . $request->passportNumber . '%')->get();
            if ($data == '[]') {
                $client = new clients([
                    'giverName' => $request->get('giverName'),
                    'giverLastName' => $request->get('giverLastName'),
                    'passportNumber' => $request->get('passportNumber'),
                    'birthday' => $request->get('birthday'),
                    'home' => $request->get('home'),
                    'lastNameGirl' => $request->get('lastNameGirl'),
                    'country' => $request->get('country'),
                    'citizenship' => $request->get('citizenship'),
                    'placeOfBirth' => $request->get('placeOfBirth'),
                    'passportDate' => $request->get('passportDate'),
                    'passportWhoGave' => $request->get('passportWhoGave'),
                    'lastVizaBeginning1' => $request->get('lastVizaBeginning1'),
                    'lastVizaEnding1' => $request->get('lastVizaEnding1'),
                    'lastVizaBeginning2' => $request->get('lastVizaBeginning2'),
                    'lastVizaEnding2' => $request->get('lastVizaEnding2'),
                    'lastVizaBeginning3' => $request->get('lastVizaBeginning3'),
                    'lastVizaEnding3' => $request->get('lastVizaEnding3'),
                    'lastVizaBeginning4' => $request->get('lastVizaBeginning4'),
                    'lastVizaEnding4' => $request->get('lastVizaEnding4'),
                    'tel' => $request->get('tel'),
                ]);
                $client->save();
                if ($request->get('printFlag') != '0') {
                    $str = explode('-', $request->get('passportDate'));
                    $str[0] = (int)$str[0] + 10;
                    $str = $str[2] . '-' . $str[1] . '-' . $str[0];
                    $insDates = explode('-', $request->get('stratDate'));
                    return view('insurance.print.print', compact('request', 'str'));
                } else {
                    return 'Not found';
                }
            } else {

                $client = clients::find($data[0]->id);
                $client->giverName = $request->get('giverName');
                $client->giverLastName = $request->get('giverLastName');
                $client->passportNumber = $request->get('passportNumber');
                $client->birthday = $request->get('birthday');
                $client->home = $request->get('home');
                $client->lastNameGirl = $request->get('lastNameGirl');
                $client->country = $request->get('country');
                $client->citizenship = $request->get('citizenship');
                $client->placeOfBirth = $request->get('placeOfBirth');
                $client->passportDate = $request->get('passportDate');
                $client->passportWhoGave = $request->get('passportWhoGave');
                $client->lastVizaBeginning1 = $request->get('lastVizaBeginning1');
                $client->lastVizaEnding1 = $request->get('lastVizaEnding1');
                $client->lastVizaBeginning2 = $request->get('lastVizaBeginning2');
                $client->lastVizaEnding2 = $request->get('lastVizaEnding2');
                $client->lastVizaBeginning3 = $request->get('lastVizaBeginning3');
                $client->lastVizaEnding3 = $request->get('lastVizaEnding3');
                $client->lastVizaBeginning4 = $request->get('lastVizaBeginning4');
                $client->lastVizaEnding4 = $request->get('lastVizaEnding4');
                $client->tel = $request->get('tel');
                $client->save();
                if ($request->get('printFlag') != '0') {
                    $str = explode('-', $request->get('passportDate'));
                    $str[0] = (int)$str[0] + 10;
                    $str = $str[2] . '-' . $str[1] . '-' . $str[0];
                    $insDates = explode('-', $request->get('stratDate'));
                    return view('insurance.print.print', compact('request', 'str'));
                } else {
                    return 'found';
                }
            }
        }
        if ($request->get('printFlag') != '0') {
            $str = explode('-', $request->get('passportDate'));
            $str[0] = (int)$str[0] + 10;
            $str = $str[2] . '-' . $str[1] . '-' . $str[0];
            $insDates = explode('-', $request->get('stratDate'));
            return view('insurance.print.print', compact('request', 'str'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
