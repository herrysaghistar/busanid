@extends('layouts.app')

@section('content')
    <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="/pp/{{$user->foto }}" alt="Profile" class="rounded-circle">
              <h3>{{ $user->username }}</h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                  @endforeach
                </div>
              @endif
              @if(session('message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ session('message') }}
                  </div>
              @endif

              <!-- Content -->

              <!-- End Content -->

            </div>
          </div>

        </div>

      </div>

    </section>

  </main><!-- End #main -->

@endsection


