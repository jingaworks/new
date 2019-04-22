@extends('layouts.cont')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Atestatul de Producator</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-lg-12">
                            <img src="{{ asset('storage/atestate/'.$data->user->id.'.jpg') }}" class="img-thumbnail">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <a href="{{ route('cont.editeaza.producator') }}" class="btn btn-primary btn-block">Editeaza datele</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
