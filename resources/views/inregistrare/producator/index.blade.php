@extends('layouts.cont')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Adauga datele Atestatului de Producator</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="row">

                    <adauga-producator></adauga-producator>

                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    Datele atasate
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
