<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Busanid.dev Test Herrys</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicons -->
  <link href="{{ asset('NiceAdmin/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('NiceAdmin/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="{{ asset('NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('NiceAdmin/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('NiceAdmin/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('NiceAdmin/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('NiceAdmin/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('NiceAdmin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('NiceAdmin/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  @include('layouts.header')
  @include('layouts.sidebar')
  @yield('content')
  @include('layouts.footer')

  <div class="modal modal-blur fade" id="modal-small" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
          <form action="/delete-sales" method="post">
          @csrf
              <div class="modal-content">
                  <div class="modal-body">
                  <div class="modal-title mb-3"><strong>Apakah anda yakin?</strong></div>
                  <input id="id_data" class="form-control" type="" name="id" hidden>
                  </div>
                  <div class="modal-footer">
                  <a href="" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Batal</a>
                  <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Hapus</button>
                  </div>
              </div>
              
          </form>
      
      </div>
  </div>

  <div class="modal fade" id="modal-small-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <form action="/update-sales" method="post">
          @csrf
              <div class="modal-content">
                  <div class="modal-body">
                  <div class="modal-title mb-3"><strong>Update record</strong></div>
                  <input id="id" class="form-control" type="text" name="id" hidden>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nominal</label>
                    <div class="col-sm-10">
                      <input type="text" id="nominal" class="form-control" name="nominal">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                      <input type="date" id="tgl" class="form-control" name="tgl">
                    </div>
                  </div>
                  </div>
                  <div class="modal-footer">
                  <a href="" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Batal</a>
                  <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Add</button>
                  </div>
              </div>
          </form>
      </div>
  </div>

  <div class="modal fade" id="modal-small-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
          <form action="/add-sales" method="post">
          @csrf
              <div class="modal-content">
                  <div class="modal-body">
                  <div class="modal-title mb-3"><strong>Apakah anda yakin?</strong></div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Handler</label>
                    <div class="col-sm-10">
                      <select class="form-select" name="user_id" aria-label="Default select example">
                        <option selected>Pilih user yang tersedia</option>
                        @foreach($user as $data)
                        <option value="{{ $data->id }}">{{ $data->id }} {{ $data->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Jenis</label>
                    <div class="col-sm-10">
                      <select class="form-select" name="jenis" aria-label="Default select example">
                        <option selected>Pilih jenis</option>
                        <option value="barang">Barang</option>
                        <option value="jasa">Jasa</option>
                      </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nominal</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nominal">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="tgl">
                    </div>
                  </div>
                  </div>
                  <div class="modal-footer">
                  <a href="" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Batal</a>
                  <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Add</button>
                  </div>
              </div>
          </form>
      </div>
  </div>

  <div class="modal modal-blur fade" id="modal-small-export" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
          <form action="/generate-report" method="post">
          @csrf
              <div class="modal-content">
                  <div class="modal-body">
                  <div class="modal-title mb-3"><strong>Export data</strong></div>
                  <label>Pilih bulan dan tahun</label>
                  <input class="form-control" type="month" name="tgl">
                  </div>
                  <div class="modal-footer">
                  <a href="" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Batal</a>
                  <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Export</button>
                  </div>
              </div>
              
          </form>
      
      </div>
  </div>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="{{ asset('NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('NiceAdmin/assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('NiceAdmin/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('NiceAdmin/assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('NiceAdmin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('NiceAdmin/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('NiceAdmin/assets/js/main.js') }}"></script>
  <script type="text/javascript">
    $('#example').DataTable();
  </script>
  <script>
      function myFunction(element) {
          var dataId = element.getAttribute('data-id');
          $("#modal-small #id_data").val( dataId );
      }
  </script>
  <script>
      function myFunction2(element) {
          var dataId = element.getAttribute('data-id');
          var dataNominal = element.getAttribute('data-nominal');
          var dataTgl = element.getAttribute('data-tgl');
          $("#modal-small-update #id").val( dataId );
          $("#modal-small-update #nominal").val( dataNominal );
          $("#modal-small-update #tgl").val( dataTgl );
      }
  </script>
</body>

</html>