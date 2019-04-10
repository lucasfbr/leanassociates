@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-md-center mt-5">
        <div class="col-xs-12 col-md-6">

            <div id="appRegister">
                <register csrf="{{csrf_token()}}" emailerror="{{$errors->first('email')}}"></register>
            </div>

        </div>
    </div>
</div>

@push('appregister')
    <script src="{{ asset('admin/js/register.js') }}"></script>
@endpush
@endsection
