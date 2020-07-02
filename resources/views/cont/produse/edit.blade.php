@extends('layouts.cont')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">Editeaza datele Atestatului de Producator</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <div>
                                        <a class="btn btn-success btn-block" href="{{ route('cont.arata.produse') }}">Inapoi la Produse</a>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <produse-producator></produse-producator>
                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div>
                                        <a class="btn btn-success btn-block" href="{{ route('cont.arata.produse') }}">Inapoi la Produse</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
