@extends('layouts.cont')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Edit own Subcategory</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    dashboard

                    <div class="row">
                        <div class="col-lg-12 pb-3">
                            Edit own Subcategory
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="row list-unstyled">
                            @foreach($all as $produs)
                                <li class="pb-2 col-lg-4">{{ $produs->nume }}</li>
                            @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="row list-unstyled">
                            @foreach($subcategorii as $produs)
                                <li class="pb-2 col-lg-4">{{ $produs->nume }}<a href="#" class="btn btn-danger float-right">x</a></li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
