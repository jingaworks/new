@extends('layouts.cont')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">Atestatul de Producator</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row mb-4">
                        <div class="col-lg-12">
                            <a href="{{ route('cont.editeaza.producator') }}" class="btn btn-primary btn-block">Editeaza datele</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-5">
                            <div class="row">
                                <div class="col-lg-12"><span class="font-weight-bold">Titular</span><span class="float-right">{{$data->user->producator->titular}}</span></div>
                                <div class="col-lg-12"><span class="font-weight-bold">Serie      Certificat</span><span class="float-right">{{$data->user->producator->getNumarCertificatAttribute()}}</span></div>
                                <div class="col-lg-12"><span class="font-weight-bold">Emitent</span><span class="float-right"> {{$data->user->producator->region}} / {{$data->user->producator->place}}</span></div>
                                <div class="col-lg-12"><span class="font-weight-bold">Telefon</span><span class="float-right">{{$data->user->producator->phone}}</span></div>
                                <div class="col-lg-12"><span class="font-weight-bold">Valabilitate Certificat</span><span class="float-right">{{$data->user->producator->viza}}</span></div>
                            </div>
                                <hr>
                            <div class="row mt-3 ">
                                <div class="col-lg-12 pb-2">
                                    <span class="font-weight-bold">Descriere Producator</span>
                                </div>
                                <div class="col-lg-12"><p>{{$data->user->producator->descriere}}</p></div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <img src="{{ asset('storage/atestate/'.$data->user->id.'.jpg') }}" class="img-thumbnail">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
