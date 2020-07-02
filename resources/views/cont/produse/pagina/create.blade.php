@extends('layouts.cont')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">Adauga Pagina Produs - {{$produs->nume}}</div>

                @if (session('status'))
                    <div class="card-body">
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                    </div>
                @endif
                
                <div class="card-body">
           
                    <form method="POST" action="{{ route('cont.editeaza.salveaza.pagina') }}" class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6 pt-0">
                                @csrf

                                <div class="form-group col-lg-12">
                                    <label for="nume" class="form-label">{{ __('Nume Produs') }}</label>
                                    <input id="nume" type="text" class="form-control{{ $errors->has('nume') ? ' is-invalid' : '' }}" name="nume" value="@if(old('nume')){{old('nume')}}@else{{$produs->nume}}@endif" required>

                                    @if ($errors->has('nume'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nume') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group col-lg-12">
                                    <label for="descriere" class="form-label">{{ __('Descriere Produs') }}</label>
                                    <textarea id="descriere" type="text" class="form-control{{ $errors->has('descriere') ? ' is-invalid' : '' }}" name="descriere" required>{{ old('descriere') }}</textarea>
                                    
                                    @if ($errors->has('descriere'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('descriere') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-lg-12 mb-0">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Salveaza Pagina') }}
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-6 pt-0">

                                <div class="form-group col-lg-12 px-3">
                                    <label for="imagini" class="form-label">{{ __('Imagini Produs') }}</label>
                                    <input id="imagini" type="text" class="form-control{{ $errors->has('imagini') ? ' is-invalid' : '' }}" name="imagini" value="{{ old('imagini') }}" >

                                    @if ($errors->has('imagini'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('imagini') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
