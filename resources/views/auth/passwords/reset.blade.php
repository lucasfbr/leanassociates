@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center mt-5">
            <div class="col-xs-12 col-md-6">

                <div id="appResetpassword">
                    
                  <resetpassword csrf="{{csrf_token()}}" token="{{$token}}" responseError="{{$errors->first()}}"></resetpassword>

                </div>
            </div>
        </div>
    </div>

    @push('appresetpassword')
    <script src="{{ asset('admin/js/resetpassword.js') }}"></script>
@endpush
@endsection
