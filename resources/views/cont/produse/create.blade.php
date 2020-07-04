@extends('layouts.cont')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="row py-3">
                <div class="col-lg-12">
                    <a class="btn btn-info btn-block" href="{{ route('cont.arata.produse') }}">Modifica Produse</a>
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
                            @if(count($data))
                                <ul>
                                    @foreach($data as $c)
                                        <li>{{ $c->nume }}</li>
                                        <ul>
                                            @foreach($c->subcategorii as $p)
                                                <li class="alert @if( in_array($p->id, $current) ) alert-success @endif">{{ $p->nume }}</li>
                                            @endforeach
                                        </ul>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
