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
                                    <label for="name" class="col-lg-4 form-label">{{ __('Nume Juridic') }}</label>

                                    <div class="col-lg-8">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
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
    <label for="phone" class="col-lg-4 form-label">{{ __('Telefon') }}</label>

    <div class="col-lg-8">
        <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>

        @if ($errors->has('phone'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
    </div>
</div>

                                <div class="form-group row">
                                    <label for="region" class="col-lg-4 form-label">{{ __('Judet') }}</label>

                                    <div class="col-lg-8">
                                        <input id="region" type="text" class="form-control{{ $errors->has('region') ? ' is-invalid' : '' }}" name="region" value="{{ old('region') }}" required>

                                        @if ($errors->has('region'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('region') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="place" class="col-lg-4 form-label">{{ __('Localitate') }}</label>

                                    <div class="col-lg-8">
                                        <input id="place" type="text" class="form-control{{ $errors->has('place') ? ' is-invalid' : '' }}" name="place" value="{{ old('place') }}" required>

                                        @if ($errors->has('place'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('place') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address" class="col-lg-4 form-label">{{ __('Adresa') }}</label>

                                    <div class="col-lg-8">
                                        <textarea name="address" id="address" cols="30" rows="4" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}">{{ old('address') }}</textarea>

                                        @if ($errors->has('address'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('address') }}</strong>
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
