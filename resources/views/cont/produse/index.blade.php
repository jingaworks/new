@extends('layouts.cont')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="row py-3">
                <div class="col-lg-12">
                    @if(count($produse) > 0)
                        <a class="btn btn-info btn-block" href="{{ route('cont.arata.produse') }}">Modifica Produse</a>
                    @else
                        <a class="btn btn-info btn-block" href="{{ route('cont.arata.produse') }}">Adauga Produse</a>   
                    @endif
                </div>
            </div>
            <div class="card">
                <div class="card-header">Products</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">
                            @if(count($produse))
                                @foreach($produse as $produs)
                                    {{ $produs->category->nume }}
                                @endforeach
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
