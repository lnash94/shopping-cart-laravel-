@extends('layouts.master')

@section('title')
    Laravel Shopping carts
@endsection

@section('content')

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <legend><h1>Sing In</h1></legend>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif
            <form action="{{route('user.signin')}}" method="post">
                <div class="form-group">
                    <div class="col-md-3">
                        <label for="email">E-mail</label>
                    </div>
                    <input type="text" id="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                        <label for="password">Password</label>
                    </div>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Sign In</button>
                {{csrf_field()}}
            </form>
            <p>Don't have an account ? <a href="{{route('user.signup')}}"> Sign up instead!</a></p>
        </div>
    </div>
@endsection