@extends('layouts.admin')

<!-- Main Content -->
@section('content')

<div class="container">
    <div class="row justify-content-md-center mt-5">
       
        <div class="col-xs-12 col-md-6">
            
            <div id="appEmail">

                <email csrf="{{csrf_token()}}"></email>

            </div>    
        </div>    

          
    </div>
</div>

@push('appemail')
    <script src="{{ asset('admin/js/email.js') }}"></script>
@endpush
@endsection
