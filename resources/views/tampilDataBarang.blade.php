@extends('layouts.admin')

@section('content')
<body>
    <h1 class = "text-center mb-4">Edit Data Katalog</h1>

    <div class="container">

      <div class="row justify-content-center">
        <div class="col-8">
          <div class="card">
            <div class="card-body">
              {{-- <form action="/updateDataBarang/{{$data->id}}" method='POST' enctype="multipart/form-data"> --}}
              <form action="{{ route('updateDataBarang', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label label for="exampleInputEmail1" class="form-label">Nama Barang</label>
                    <input type="text" name="namaBarang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->namaBarang }}">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->deskripsi }}">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Jenis</label>
                    <select name="jenis" aria-label="Default select example">
                        <option selected >Pilih Jenis Barang</option>
                        <option value="Hardware">Hardware</option>
                        <option value="Software">Software</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->harga }}">
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Barang</label>
                    @if($data->foto)
                        <div>
                            <img src="{{ asset('fotoBarang/'.$data->foto) }}" alt="Foto Barang" width="100">
                            <p>Nama File: {{ $data->foto }}</p>
                        </div>
                    @endif
                    <input type="file" name="foto" class="form-control" id="foto">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
          </div>

          </div>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
@endsection
