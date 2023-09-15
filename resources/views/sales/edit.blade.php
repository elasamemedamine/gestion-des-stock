@extends('layouts.app')


@section("content")
<div class="container">
    <form id="add-sale" action="{{ route("sales.update",$sale->id) }}" method="post">
        @csrf
        @method("PUT")
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <a href="/payments" class="btn btn-outline-secondary">
                                <i class="fa fa-chevron-left"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @foreach ($stock as $st)
                            <div class="col-md-3">
                                <div class="card p-2 mb-2 d-flex
                                                    flex-column justify-content-center
                                                    align-items-center
                                                    list-group-item-action">
                                    <div class="align-self-end">
                                        <input type="checkbox" name="stock_id[]" id="stock" checked value="{{ $st->id }}">
                                    </div>
                                    <i class="fa fa-chair fa-5x"></i>
                                    <span class="mt-2 text-muted font-weight-bold">
                                        {{ $st->name }}
                                    </span>
                                    <hr>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-2">
            <div class="col-md-12 card p-3">
                <div class="row">
                    @foreach($tarifs as $tarif)
                    <div class="col-md-4 mb-2">
                        <div class="card h-100">
                            <div class="card-body d-flex
                                    flex-column justify-content-center
                                    align-items-center">
                                <div class="align-self-end">
                                    <input type="checkbox" name="tarif_id[]" id="tarif_id" checked value="{{ $tarif->id }}">
                                </div>
                                <img src="{{ asset("images/tarifs/". $tarif->image) }}" alt="{{ $tarif->title}}" class="img-fluid rounded-circle" width="100" height="100">
                                <h5 class="font-weight-bold mt-2">
                                    {{ $tarif->title }}
                                </h5>
                                <h5 class="text-muted">
                                    {{ $tarif->price }} DH
                                </h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="form-group">
                            <select name="livreur_id" class="form-control">
                                <option value="" selected disabled>
                                    Livreurs
                                </option>
                                @foreach ($livreurs as $livreur)
                                <option {{ $livreur->id === $sale->livreur_id ? "selected" : "" }} value="{{ $livreur->id }}">
                                    {{ $livreur->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    Qté
                                </div>
                            </div>
                            <input type="number" name="quantity" class="form-control" placeholder="Qté" value="{{ $sale->quantity }}">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    $
                                </div>
                            </div>
                            <input type="number" name="total_price" class="form-control" placeholder="Prix" value="{{ $sale->total_price }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    .00
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    $
                                </div>
                            </div>
                            <input type="number" name="total_received" class="form-control" placeholder="Total" value="{{ $sale->total_received }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    .00
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    $
                                </div>
                            </div>
                            <input type="number" name="change" class="form-control" placeholder="Reste" value="{{ $sale->change }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    .00
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="payment_type" class="form-control">
                                <option value="" selected disabled>
                                    Type de paiement
                                </option>
                                <option value="cash" {{ $sale->payment_type === "cash" ? "selected" : ""}}>
                                    Espéce
                                </option>
                                <option value="card" {{ $sale->payment_type === "card" ? "selected" : ""}}>
                                    Carte bancaire
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="payment_status" class="form-control">
                                <option value="" selected disabled>
                                    Etat de paiement
                                </option>
                                <option value="paid" {{ $sale->payment_status === "paid" ? "selected" : ""}}>
                                    Payé
                                </option>
                                <option value="unpaid" {{ $sale->payment_status === "unpaid" ? "selected" : ""}}>
                                    Impayé
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">
                                Valider
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection