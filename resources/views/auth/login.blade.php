@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-md-center mt-5">
       
        <div class="col-xs-12 col-md-6">
        
            <div class="card">
              <div class="card-header personal">
                <div class="h5 text-default">Login</div>
              </div>
              <div class="card-body">
               
                  
                   <form method="POST" action="{{ url('/login') }}>
                     {{ csrf_field() }}
                     <div class="form-group">
                        <label for="email" class="text-default">E-mail</label>
                        <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="{{ old('email') }}" required  autofocus>
                      </div>
                      <div class="form-group">
                        <label for="password" class="text-default">Senha</label>
                        <input type="password" class="form-control" name="password" id="password">
                      </div>
                      <button type="submit" class="btn btn-secondary">Entrar</button>
                      <a class="btn btn-link text-secondary" href="{{ url('/password/reset') }}">Esqueceu sua senha?</a>
                    </form>
            
                
              </div>
            </div>

        </div>

    </div>
</div>

    

@endsection
