@extends('layouts.app')

@section('content')
    <main id="main" class="main">

    <div class="pagetitle">
      <h1>Sales Report</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">

        <div class="card">
            <div class="card-body">
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
              <button class="btn btn-outline-primary mt-5" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modal-small"> Add Record </button>
              <button class="btn btn-outline-warning mt-5" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modal-small-export"> Export Record </button>
              <h5 class="card-title">Sales Report</h5>

              <!-- Table with stripped rows -->
              <table class="table" id="example">
                <thead>
                  <tr>
                    <th scope="col">handler</th>
                    <th scope="col">Tipe</th>
                    <th scope="col">Nominal</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $datas)
                  <tr>
                    <td>{{ $datas->user->name }}</td>
                    <td>{{ $datas->jenis }}</td>
                    <td>{{ $datas->nominal }}</td>
                    <td>{{ \Carbon\Carbon::parse($datas->tgl)->format('d-m-Y') }}</td>
                    <td><button class="btn btn-outline-warning">edit</button> <button class="btn btn-danger" onclick="myFunction(this)" data-id="{{ $datas->id }}" data-name="'+ data.name +'" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modal-small">delete</button></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
        </div>
        
      </div>

    </section>

  </main><!-- End #main -->

@endsection


