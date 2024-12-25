@extends('index')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@section('content')  
<head> 
<link href="/css/main.css" rel="stylesheet">
</head>
<main>
  <div class="mx-auto max-w-10xl px-7 py-8 sm:px-6 lg:px-8">
    <div class="container">

      <!-- Display Flash Messages -->
      @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif

      @if (session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
      @endif

      <div class="row align-items-start">
        <div class="col">
          <body>
          <div class="card" style="background-color:snow;">
            <div class="card-body" style="text-align: center;">
              <h5 class="card-title" style="font-weight: bolder;">{{$test->name}}</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item" style="background-color:snow;">Details: {{$test->details}}</li>
              <li class="list-group-item" style="background-color: snow;">Price: {{$test->price}}</li>
              <li class="list-group-item" style="background-color: snow;">Instructions: {{$test->instructions}}</li>
              <li class="list-group-item" style="background-color: snow;">Expected time for test: {{$test->expected_time_for_test}}</li>
              <li class="list-group-item" style="background-color:snow;">Status: {{$test->status}}</li>
            </ul>
            @if($test->can_taken == 1)
            <form method="POST" action="{{ url('/add_test', $test->id) }}">
              @csrf
              <div class="card-body" style="text-align: right;">
                <div class="btn btn-primary">
                  <button type="submit">ADD</button>
                </div>
              </div>
            </form>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
