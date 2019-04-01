@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-md-center mt-5">
       
        <div class="col-xs-12 col-md-6">

          <div id="appLogin">
            
            <login csrf="{{csrf_token()}}" emailerror="{{$errors->has('email')}}" passworderror="{{$errors->has('password')}}"></login>
           
          </div>
        </div>

    </div>
</div>

    
@push('applogin')
    <script src="{{ asset('admin/js/login.js') }}"></script>
@endpush

@endsection
