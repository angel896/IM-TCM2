@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ \Session::get('success') }}</p>
                    </div><br />
                @endif

                <div class="panel-body">
                    
                    @if (isset($user))
                    <form class="form-horizontal" method="POST"  enctype="multipart/form-data" action="{{action('Auth\RegisterController@update', $user->id)}}">
                        {!!method_field('PUT')!!}
                    @else
                    <form class="form-horizontal" method="POST"  enctype="multipart/form-data" action="{{ route('register') }}">
                    @endif

                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$user->name or old('name')}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{$user->email or old('email')}}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="type" class="col-md-4 control-label">Type</label>
                            <div class="col-md-6">
                                <select name="type" class="form-control" id="type" required>
                                    <option value=""></option>
                                    <option value="Super Admin" @if(isset($user) && $user->type=='Super Admin') selected @endif>Super Admin</option>
                                    <option value="Admin" @if(isset($user) && $user->type=='Admin') selected @endif>Admin</option>
                                    <option value="Vistoriador" @if(isset($user) && $user->type=='Vistoriador') selected @endif>Vistoriador</option>
                                    <option value="Corretor" @if(isset($user) && $user->type=='Corretor') selected @endif>Corretor</option>
                                    <option value="Cliente" @if(isset($user) && $user->type=='Cliente') selected @endif>Cliente</option>
                                </select>
                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                            <label for="photo" class="col-md-4 control-label">Photo</label>

                            <div class="col-md-6">
                                <input id="photo" type="file" class="form-control" name="photo">

                                @if ($errors->has('photo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('rg') ? ' has-error' : '' }}">
                            <label for="rg" class="col-md-4 control-label">RG</label>

                            <div class="col-md-6">
                                <input id="rg" type="text" class="form-control" name="rg" value="{{$user->rg or old('rg')}}">

                                @if ($errors->has('rg'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rg') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
                            <label for="cpf" class="col-md-4 control-label">CPF</label>

                            <div class="col-md-6">
                                <input id="cpf" type="text" class="form-control" name="cpf" value="{{$user->cpf or old('cpf')}}">

                                @if ($errors->has('cpf'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cpf') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('cep') ? ' has-error' : '' }}">
                            <label for="cep" class="col-md-4 control-label">CEP</label>

                            <div class="col-md-6">
                                <input id="cep" type="text" class="form-control" name="cep" value="{{$user->address->cep or old('cep')}}">

                                @if ($errors->has('cep'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cep') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                            <label for="number" class="col-md-4 control-label">Number</label>

                            <div class="col-md-6">
                                <input id="number" type="number" class="form-control" name="number" value="{{$user->address->number or old('number')}}">

                                @if ($errors->has('number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
