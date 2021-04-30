@extends('layouts/app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Страховка.</div>

                    <div class="card-body">
                        <form method="post" action="{{url('insurance')}}">

                            {{csrf_field()}}
                            <input type="hidden" value="0" name="printFlag" id="printFlag">
                            <autocomplete-component></autocomplete-component>
                            <button class="btn btn-success" type="submit">Добавить в бд.</button>
                            <button class="btn btn-success" type="submit" onclick="document.getElementById('printFlag').value = 1;">Распечатать и применить изменения</button>
                            <button class="btn btn-success" type="submit" onclick="document.getElementById('printFlag').value = 2;">Распечатать</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
