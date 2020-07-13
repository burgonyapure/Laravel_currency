<template>
    <div class="container">  
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pesti-tab" data-toggle="tab" href="#pesti" role="tab" aria-controls="pesti" aria-selected="true">Pesti u.</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="unio-tab" data-toggle="tab" href="#unio" role="tab" aria-controls="unio" aria-selected="false">Unió</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="szoboszlo-tab" data-toggle="tab" href="#szoboszlo" role="tab" aria-controls="szoboszlo" aria-selected="false">Szoboszló</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="berettyo-tab" data-toggle="tab" href="#berettyo" role="tab" aria-controls="berettyo" aria-selected="false">Berettyó</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="budapest-tab" data-toggle="tab" href="#budapest" role="tab" aria-controls="budapest" aria-selected="false">Budapest (Homoktövis)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="dunakeszi-tab" data-toggle="tab" href="#dunakeszi" role="tab" aria-controls="dunakeszi" aria-selected="false">Dunakeszi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="karasz-tab" data-toggle="tab" href="#karasz" role="tab" aria-controls="karasz" aria-selected="false">Kárász 5/1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tisza-tab" data-toggle="tab" href="#tisza" role="tab" aria-controls="tisza" aria-selected="false">Tisza Lajos</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="pesti" role="tabpanel" aria-labelledby="pesti-tab">
                    <div class="card card-primary">
                        <div class="card-header">
                            Pesti u.<button type="button" @click="send" class="btn btn-success float-right">Küldés!</button>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 10px">Valuta</th>
                                        <th>Vétel</th>
                                        <th>Eladás</th>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">USD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">EUR</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">GBP</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">AUD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">CZK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">DKK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">HRK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">CAD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">CHF</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">SEK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">PLN</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">RON</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">RSD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="unio" role="tabpanel" aria-labelledby="unio-tab">
                   <div class="card card-primary">
                        <div class="card-header">Unió</div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 10px">Valuta</th>
                                        <th>Vétel</th>
                                        <th>Eladás</th>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">USD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">EUR</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">GBP</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">AUD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">CZK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">DKK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">HRK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">CAD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">CHF</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">SEK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">PLN</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">RON</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">RSD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="szoboszlo" role="tabpanel" aria-labelledby="szoboszlo-tab">
                    <div class="card card-primary">
                        <div class="card-header">Szoboszló</div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 10px">Valuta</th>
                                        <th>Vétel</th>
                                        <th>Eladás</th>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">USD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">EUR</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">GBP</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">AUD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">CZK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">DKK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">HRK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">CAD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">CHF</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">SEK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">PLN</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">RON</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">RSD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="berettyo" role="tabpanel" aria-labelledby="berettyo-tab">
                    <div class="card card-primary">
                        <div class="card-header">Berettyó</div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 10px">Valuta</th>
                                        <th>Vétel</th>
                                        <th>Eladás</th>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">USD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">EUR</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">GBP</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">AUD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">CZK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">DKK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">HRK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">CAD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">CHF</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">SEK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">PLN</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">RON</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">RSD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="budapest" role="tabpanel" aria-labelledby="budapest-tab">
                    <div class="card card-primary">
                        <div class="card-header">Budapest (Homoktövis)</div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 10px">Valuta</th>
                                        <th>Vétel</th>
                                        <th>Eladás</th>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">USD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">EUR</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">GBP</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">AUD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">CZK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">DKK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">HRK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">CAD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">CHF</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">SEK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">PLN</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">RON</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">RSD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="dunakeszi" role="tabpanel" aria-labelledby="dunakeszi-tab">
                    <div class="card card-primary">
                        <div class="card-header">Dunakeszi</div>
                        <div class="card-body">
                        <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 10px">Valuta</th>
                                        <th>Vétel</th>
                                        <th>Eladás</th>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">USD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">EUR</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">GBP</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">AUD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">CZK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">DKK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">HRK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">CAD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">CHF</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">SEK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">PLN</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">RON</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">RSD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="karasz" role="tabpanel" aria-labelledby="krarasz-tab">
                    <div class="card card-primary">
                        <div class="card-header">Kárász 5/1</div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 10px">Valuta</th>
                                        <th>Vétel</th>
                                        <th>Eladás</th>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">USD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">EUR</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">GBP</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">AUD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">CZK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">DKK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">HRK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">CAD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">CHF</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">SEK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">PLN</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">RON</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">RSD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="tisza" role="tabpanel" aria-labelledby="tisza-tab">
                    <div class="card card-primary">
                        <div class="card-header">Tisza Lajos</div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 10px">Valuta</th>
                                        <th>Vétel</th>
                                        <th>Eladás</th>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">USD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">EUR</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">GBP</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">AUD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">CZK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">DKK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">HRK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">CAD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">CHF</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">SEK</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">PLN</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">RON</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" style="text-align:center;">RSD</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Vétel">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Eladás">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</template>

<script>
    export default {
        methods: {
            send(){
                swalWithBootstrapButtons.fire({
                    title: 'Biztosan Elküldöd?',
                    text: "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Igen, elküldöm!',
                    cancelButtonText: 'Nem!',
                    reverseButtons: true
                }).then((result) => {
                
                if (result.value) {
                    swalWithBootstrapButtons.fire(
                      'Elküldve!',
                      'A kért árfolyamot elküldtük!',
                      'success'
                    )
                }
                else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire(
                      'Mégsem',
                      'Nem küldtem semmit :)',
                      'error'
                    )
              }

              })
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>