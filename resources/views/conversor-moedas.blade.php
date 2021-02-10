@extends('layouts.layout')

@section('content')
<article class="row">
    <div class="col-sm-12 col-md-4 col-lg-4 mx-auto">
        <form action="{{$target}}" class="card text-center" method="post">
            <fieldset class="card-body">
                @csrf
                <div class="mb-3">
                    <input type="radio" class="btn-check" name="base" id="base1" autocomplete="off" value="BRL" checked="checked">
                    <label class="btn btn-outline-warning" for="base1">BRL</label>
                    <input type="radio" class="btn-check" name="base" id="base2" autocomplete="off" value="CAD">
                    <label class="btn btn-outline-warning" for="base2">CAD</label>
                    <input type="radio" class="btn-check" name="base" id="base3" autocomplete="off" value="USD">
                    <label class="btn btn-outline-warning" for="base3">USD</label>
                </div>
                <div class="text-center mb-3"><small>Real Brasileiro</small></div>
                <div class="col-sm-12 col-lg-6 mx-auto">
                    <div class="input-group mb-3">
                        <span class="input-group-text">$</span>
                        <input type="text" class="form-control" name="price" value="" aria-label="Dollar amount (with dot and two decimal places)">
                    </div>
                </div>
                <div class="border-bottom my-3"></div>
                <div class="mb-3">
                    <input type="radio" class="btn-check" name="result" id="result1" autocomplete="off" value="BRL">
                    <label class="btn btn-outline-danger" for="result1">BRL</label>
                    <input type="radio" class="btn-check" name="result" id="result2" autocomplete="off" value="CAD">
                    <label class="btn btn-outline-danger" for="result2">CAD</label>
                    <input type="radio" class="btn-check" name="result" id="result3" autocomplete="off" value="USD" checked="checked">
                    <label class="btn btn-outline-danger" for="result3">USD</label>
                </div>
                <div class="text-center mb-3"><small>Dólar Americano</small></div>
                <div>
                    <h3>R$ 6.00</h3>
                </div>
                <div class="d-grid gap-2">
                    <input type="submit" class="btn btn-primary" name="submit" value="Enviar">
                </div>
            </<fieldset>
        </form>
    </div>
</article>
<article class="row">
    <div class="col-12 my-5">
        <header class="my-4 text-center"><h2>Resultados das conversões</h2></header>
        <table class="table table-striped">
            <tr>
                <th scope="col">Moeda1</th>
                <th scope="col">Valor</th>
                <th scope="col">Moeda2</th>
                <th scope="col">Valor</th>
                <th scope="col">data</th>
            </tr>
            <tr>
                <td>BRL- Real Brasileiro</td>
                <td>R$ 27.00</td>
                <td>USD- Dólar Americano</td>
                <td>R$ 5.00</td>
                <td>09-02-2021</td>
            </tr>
            <tr>
                <td>BRL- Real Brasileiro</td>
                <td>R$ 5.00</td>
                <td>USD- Dólar Canadense</td>
                <td>R$ 1.52</td>
                <td>09-02-2021</td>
            </tr>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>
    </div>
</article>

@endsection