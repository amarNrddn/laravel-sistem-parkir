@extends('layouts.app')

@section('content')
<form action="{{ route('login') }}" method="post">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card card-default" style="margin-top:20%;">
                    <div class="card-header">
                        <h3 class="text-center">Login <span class="fa fa-user"></span></h3>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="" class="form-control{{ $errors->has('email') ? ' is-invalid' : ''  }}" required="" autocomplete="off">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" value="{{ old('password') }}" placeholder="" class="form-control{{ $errors->has('password') ? ' is-invalid' : ''  }}" required="">
                                 @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </span>
                                @endif
                            </div>
                        </div>  
                    </div>
                    <div class="card-footer">
                        {{  csrf_field()    }}                      
                        <button type="submit" class="btn btn-outline-dark btn-block">Login</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
