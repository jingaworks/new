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

                        <div class="col-lg-6">
                                    
                            <form method="POST" action="{{ route('cont.adauga.producator') }}">
                                @csrf

                                <div class="form-group row px-3">
                                    <label for="titular" class="form-label">{{ __('Titular') }}</label>
                                    <input id="titular" type="text" class="form-control{{ $errors->has('titular') ? ' is-invalid' : '' }}" name="titular" value="{{ old('titular') }}" required>

                                    @if ($errors->has('titular'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('titular') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group row px-3">
                                    <label for="serie" class="form-label">{{ __('Serie') }}</label>
                                    <input id="serie" type="text" class="form-control{{ $errors->has('serie') ? ' is-invalid' : '' }}" name="serie" value="{{ old('serie') }}" required>

                                    @if ($errors->has('serie'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('serie') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group row px-3">
                                    <label for="numar" class="form-label">{{ __('Numar') }}</label>
                                    <input id="numar" type="text" class="form-control{{ $errors->has('numar') ? ' is-invalid' : '' }}" name="serie" value="{{ old('numar') }}" required>

                                    @if ($errors->has('numar'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('numar') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group row px-3">
                                    <label for="place" class="form-label">{{ __('Primaria emitenta') }}</label>
                                    <input id="place" type="text" class="form-control{{ $errors->has('place') ? ' is-invalid' : '' }}" name="place" value="{{ old('place') }}" required>

                                    @if ($errors->has('place'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('place') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group row px-3">
                                    <label for="region" class="form-label">{{ __('Judet') }}</label>
                                    <input id="region" type="text" class="form-control{{ $errors->has('region') ? ' is-invalid' : '' }}" name="region" value="{{ old('region') }}" required>

                                    @if ($errors->has('region'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('region') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group row px-3">
                                    <label for="viza" class="form-label">{{ __('Anul vizat') }}</label>
                                    <select name="viza" id="viza" class="form-control{{ $errors->has('viza') ? ' is-invalid' : '' }}">
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                    </select>

                                    @if ($errors->has('viza'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('viza') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group row mb-0 px-3">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Adauga Datele') }}
                                    </button>
                                </div>
                            </form>

                        </div>
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
