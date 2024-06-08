@extends('layouts.admin')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
<style> h1 {
    margin-left: 500px;
}</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center">
            <h1 class="m-0">Katalog Barang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="container">
        <a href="/addBarang" type="button" class="btn btn-primary">Add Data +</a>

          <div class="row g-3 align-items-center mt-2 mb-2">
            <div class="col-auto">
              <form action="/katalog" method="GET">
                <input type="search" id="inputSearch" name="search" class="form-control" aria-describedby="passwordHelpInline" placeholder="Ketikkan Nama Barang">
              </form>
            </div>
            <div class="col-auto">
              <a href="/exportPDF" type="button" class="btn btn-danger">Export PDF</a>
            </div>
            <div class="col-auto">
              <a href="/exportExcel" type="button" class="btn btn-success">Export Excel</a>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Import Data
                </button>
            </div>
          </div>

        <div class="row g-3 align-items-center mt-2 mb-2">
        @if($message = Session::get('sukses'))
          <div class="sdf" role="alert">
             <strong>{{$message}}</strong>
          </div>

        @endif

          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Foto</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Jenis Barang</th>
                <th scope="col">Harga</th>
                <th scope="col">Tanggal Ditambahkan</th>
                <th scope="col">Tanggal Diperbarui</th>
                <th scope="col">Harga</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>

              @php
                $no = 1;
              @endphp

              @foreach ($data as $index=> $row)
              <tr>
                <th scope="row">{{$index + $data->firstItem()}}</th>
                <td>{{$row->namaBarang}}</td>
                <td>
                    <img src="{{asset('fotoBarang/'.$row->foto)}}" alt="" style="width: 40px;">
                </td>
                <td>{{$row->deskripsi}}</td>
                <td>{{$row->jenis}}</td>
                <td>{{$row->harga}}</td>
                <td>{{$row->created_at-> format('D M Y') }}</td>
                <td>{{$row->updated_at-> diffForHumans()}}</td>
                <td>
                  <a href ="/tampilDataBarang/{{$row->id}}" class="btn btn-info">Edit</a>
                  <a href="/deleteDataBarang/{{$row->id}}" type="button" class="btn btn-danger delete" data-id="{{$row->id}}" data-namaBarang="{{$row->namaBarang}}">Delete</a>
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
          {{ $data->links() }}
        </div>
    </div>

</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>

    <script>
    @if(Session::has('sukses'))
    toastr.success("{{Session::get('sukses')}}")
    @endif
    </script>
@endpush


@endsection
