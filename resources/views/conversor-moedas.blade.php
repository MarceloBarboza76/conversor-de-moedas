@extends('layouts.layout')

@section('content')
<article class="row">
    <div class="col-sm-12 col-md-6 col-lg-4 mx-auto">
        <form action="{{$target}}" class="card text-center" method="post">
            <fieldset class="card-body">
                @csrf
                <div class="mb-3">
                    <input type="radio" class="btn-check" name="base" id="base1" autocomplete="off" value="BRL" data-moeda-base="Real Brasileiro" @if($base == 'BRL')checked="checked"@endif>
                    <label class="btn btn-outline-warning" for="base1">BRL</label>
                    <input type="radio" class="btn-check" name="base" id="base2" autocomplete="off" value="CAD" data-moeda-base="Dólar Canadense" @if($base == 'CAD')checked="checked"@endif>
                    <label class="btn btn-outline-warning" for="base2">CAD</label>
                    <input type="radio" class="btn-check" name="base" id="base3" autocomplete="off" value="USD" data-moeda-base="Dólar Americano" @if($base == 'USD')checked="checked"@endif>
                    <label class="btn btn-outline-warning" for="base3">USD</label>
                </div>
                <div class="text-center mb-3">
                    <input type="hidden" id="moeda_base" name="moeda_base" value="{{$moeda_base}}">
                    <small>{{$moeda_base}}</small>
                </div>
                <div class="col-sm-12 col-lg-6 mx-auto">
                    <div class="input-group mb-3">
                        <span class="input-group-text">$</span>
                        <input type="text" class="form-control" name="price" value="{{$price ?? '0,00'}}" aria-label="Dollar amount (with dot and two decimal places)">
                    </div>
                </div>
                <div class="border-bottom my-3"></div>
                <div class="mb-3">
                    <input type="radio" class="btn-check" name="result" id="result1" autocomplete="off" value="BRL" data-moeda-result="Real Brasileiro" @if($result == 'BRL')checked="checked"@endif>
                    <label class="btn btn-outline-danger" for="result1">BRL</label>
                    <input type="radio" class="btn-check" name="result" id="result2" autocomplete="off" value="CAD" data-moeda-result="Dólar Canadense" @if($result == 'CAD')checked="checked"@endif>
                    <label class="btn btn-outline-danger" for="result2">CAD</label>
                    <input type="radio" class="btn-check" name="result" id="result3" autocomplete="off" value="USD" data-moeda-result="Dólar Americano" @if($result == 'USD')checked="checked"@endif>
                    <label class="btn btn-outline-danger" for="result3">USD</label>
                </div>
                <div class="text-center mb-3">
                    <input type="hidden" id="moeda_result" name="moeda_result" value="{{$moeda_result}}">
                    <small>{{$moeda_result}}</small>
                </div>
                <div>
                    <h3>R$ {{$converted ?? '0,00'}}</h3>
                </div>
                <div class="d-grid gap-2">
                    <input type="submit" class="btn btn-primary" name="submit" value="Enviar">
                </div>
            </<fieldset>
        </form>
    </div>
    <p class="text-center">{{$dateNow}}</p>
</article>
<article class="row">
    <div class="col-12 my-5">
        <header class="my-4 text-center"><h2>Resultados das conversões</h2></header>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="col">Moeda Base</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Moeda para Conversão</th>
                    <th scope="col">Valor</th>
                    <th scope="col">data</th>
                </tr>
                @forelse($convertedTable as $rowsTable)
                    <tr>
                        <td>{{$rowsTable->moeda_base}}</td>
                        <td>R$ {{number_format($rowsTable->value_base, 2, ',', ' ')}}</td>
                        <td>{{$rowsTable->moeda_converted}}</td>
                        <td>R$ {{number_format($rowsTable->value_converted, 2, ',', ' ')}}</td>
                        <td>{{$rowsTable->date_add->format('d-m-Y H:i:s')}}</td>
                    </tr>
                @empty
                <tr></tr>
                @endforelse
            </table>
        </div>
        {{$convertedTable->onEachSide(2)->links()}}
    </div>
</article>

@endsection