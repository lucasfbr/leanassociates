@extends('layouts.site')

@section('content')


  <section class="bg-cinza section-servico">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-8 text-center">
          <div class="detalhes">
          <img src="{{ asset('img/img05.jpg') }}" class="img-fluid" alt="Responsive image">
          <p class="h4 text-center mb-4">Serviço - {{$id}}</p>
          <p class="mb-5">
            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing
            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing
            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing
            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing
          </p>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection