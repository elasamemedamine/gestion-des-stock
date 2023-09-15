@extends('layouts.app')


@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            @include('layouts.sidebar')
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex flex-row justify-content-between align-items-center border-bottom pb-1">
                                <h3 class="text-secondary">
                                    <i class="fas fa-clipboard-list"></i> Tarif
                                </h3>
                                <a href="{{ route("tarifs.create") }}" class="btn btn-primary">
                                    <i class="fas fa-plus fa-x2"></i>
                                </a>
                            </div>
                            <table class="table table-hover table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Titre</th>
                                        <th>Description</th>
                                        <th>Prix</th>
                                        <th>Catégorie</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tarifs as $tarif)
                                    <tr>
                                        <td>
                                            {{ $tarif->id }}
                                        </td>
                                        <td>
                                            {{ $tarif->title }}
                                        </td>
                                        <td>
                                            {{ substr($tarif->description,0,100)}}
                                        </td>
                                        <td>
                                            {{ $tarif->price}} DH
                                        </td>
                                        <td>
                                            {{ $tarif->category->title ??''}}
                                        </td>
                                        <td>
                                            <img src="{{ asset("images/tarifs/". $tarif->image) }}" alt="{{ $tarif->title}}" class="fluid rounded" width="60" height="60">
                                        </td>
                                        <td class="d-flex flex-row justify-content-center align-items-center">
                                            <a href="{{ route("tarifs.edit",$tarif->slug) }}" class="btn btn-warning mr-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form id="{{ $tarif->id }}" action="{{ route("tarifs.destroy",$tarif->slug) }}" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="my-3 d-flex justify-content-center align-items-center">
                                {{ $tarifs->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection