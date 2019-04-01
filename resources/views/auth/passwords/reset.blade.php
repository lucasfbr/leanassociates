@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center mt-5">
            <div class="col-xs-12 col-md-6">

                <div id="appResetpassword">
                    
                  <resetpassword></resetpassword>

                </div>
            </div>
        </div>
    </div>

    @push('appresetpassword')
    <script src="{{ asset('admin/js/resetpassword.js') }}"></script>
@endpush
@endsection
