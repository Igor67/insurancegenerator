@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="justify-content-center"><h1>Все страховщики</h1></div>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Название</th>
                <th>Телефон</th>
                <th>Электронный номер</th>

            </tr>
            </thead>
            <tbody>
            @foreach($firms as $firm)
                <tr>
                    <td>{{$firm->firm}}</td>
                    <td>{{$firm->firmBody}}</td>
                    <td>{{$firm->electronicNumber}}</td>

                </tr>

            @endforeach
            </tbody>
        </table>
    </div>

@endsection
