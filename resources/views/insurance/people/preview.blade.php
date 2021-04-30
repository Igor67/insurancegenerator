@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="justify-content-center"><h1>Все страховщики</h1></div>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Паспорт</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Девичья фамилия</th>

            </tr>
            </thead>
            <tbody>
            @foreach($people as $human)
                <tr>
                    <td>{{$human->passportNumber}}</td>
                    <td>{{$human->giverName}}</td>
                    <td>{{$human->giverLastName}}</td>
                    <td>{{ $human->lastNameGirl}}</td>

                </tr>

            @endforeach
            </tbody>
        </table>
    </div>

@endsection
