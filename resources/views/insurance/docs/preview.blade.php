@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="justify-content-center"><h1>Мои страховки</h1></div>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>№з/п</th>
                <th>Серія</th>
                <th>Номер</th>
                <th>Дата укладення</th>
                <th>Дата початку</th>
                <th>Дата закінчення</th>
                <th>К-сть днів</th>
                <th>Франшиза</th>
                <th>Програма</th>
                <th>Країна пребування</th>
                <th>Страхувальник/Застрахована особа</th>
                <th>Паспорт</th>
                <th>Дата народження</th>
                <th>Страхова сума МВ</th>
                <th>ВАЛЮТА страхової суми</th>
                <th>Премія МВ, грн.</th>

            </tr>
            </thead>
            <tbody>
            @foreach($docs as $doc)
                <tr>
                    <td>{{$doc->id}}</td>
                    <td>ВЗК</td>
                    <td>{{$doc->polNumber}}</td>
                    <td>{{$doc->createDate}}</td>
                    <td>{{$doc->startdate}}</td>
                    <td>TODO</td>
                    <td>{{$doc->days}}</td>
                    <td>{{$doc->fran}}</td>
                    <td>{{$doc->type}}</td>
                    <td>{{\Illuminate\Support\Facades\DB::table('clients')->where('passportNumber', 'LIKE', '%' . $doc->passportNumber . '%')->get()[0]->country}}</td>
                    <td>{{\Illuminate\Support\Facades\DB::table('clients')->where('passportNumber', 'LIKE', '%' . $doc->passportNumber . '%')->get()[0]->giverName}} {{\Illuminate\Support\Facades\DB::table('clients')->where('passportNumber', 'LIKE', '%' . $doc->passportNumber . '%')->get()[0]->giverLastName}}</td>
                    <td>{{$doc->passportNumber}}</td>
                    <td>{{\Illuminate\Support\Facades\DB::table('clients')->where('passportNumber', 'LIKE', '%' . $doc->passportNumber . '%')->get()[0]->birthday}}</td>
                    <td>{{$doc->summ}}</td>
                    <td>EUR</td>
                    <td>{{$doc->prem}}</td>


                </tr>

            @endforeach
            </tbody>
        </table>
        <form method="post"  action="{{url('report')}}">
            <div>
                {{csrf_field()}}
                <label for="giverName">Дата начала</label>
                <input required id="date" name="date" type="date" class="form-control" required>
            </div>
            <button type="submit">123</button>
        </form>


    </div>

@endsection
