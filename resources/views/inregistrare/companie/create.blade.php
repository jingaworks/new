@extends('layouts.cont')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Adauga datele de inregistrare in Registrul de Comertului</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="row">

                        <div class="col-lg-7 col-md-12 col-sm-12">
                                    
                            <form method="POST" action="{{ route('cont.adauga.companie') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="nume" class="col-lg-4 form-label">{{ __('Nume Juridic') }}</label>

                                    <div class="col-lg-8">
                                        <input id="nume" type="text" class="form-control{{ $errors->has('nume') ? ' is-invalid' : '' }}" name="nume" value="{{ old('nume') }}" required>

                                        @if ($errors->has('nume'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nume') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="cui" class="col-lg-4 form-label">{{ __('CUI') }}</label>

                                    <div class="col-lg-8">
                                        <input id="cui" type="text" class="form-control{{ $errors->has('cui') ? ' is-invalid' : '' }}" name="cui" value="{{ old('cui') }}" required>

                                        @if ($errors->has('cui'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('cui') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="judet" class="col-lg-4 form-label">{{ __('Judet') }}</label>

                                    <div class="col-lg-8">
                                        <input id="judet" type="text" class="form-control{{ $errors->has('judet') ? ' is-invalid' : '' }}" name="judet" value="{{ old('judet') }}" required>

                                        @if ($errors->has('judet'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('judet') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="localitate" class="col-lg-4 form-label">{{ __('Localitate') }}</label>

                                    <div class="col-lg-8">
                                        <input id="localitate" type="text" class="form-control{{ $errors->has('localitate') ? ' is-invalid' : '' }}" name="localitate" value="{{ old('localitate') }}" required>

                                        @if ($errors->has('localitate'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('localitate') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="adresa" class="col-lg-4 form-label">{{ __('Adresa') }}</label>

                                    <div class="col-lg-8">
                                        <textarea name="adresa" id="adresa" cols="30" rows="4" class="form-control{{ $errors->has('adresa') ? ' is-invalid' : '' }}">{{ old('adresa') }}</textarea>

                                        @if ($errors->has('adresa'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('adresa') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            {{ __('Adauga Datele') }}
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>

                        <div class="col-lg-5 col-md-12 col-sm-12">
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
