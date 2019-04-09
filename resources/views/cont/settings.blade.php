@extends('layouts.cont')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Settings</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    dashboard

                    <div class="row">
                        <div class="col-lg-12">
                            Settings
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <a href="#" class="btn btn-primary btn-block">Editeaza datele</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
