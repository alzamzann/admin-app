<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Katalog Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @stack('css')
  </head>
  <body>
    <h1 class = "text-center mb-4">Katalog Barang</h1>

    <div class="container">
      <a href="/addBarang" type="button" class="btn btn-primary">Add Data +</a>

        <div class="row g-3 align-items-center mt-2">
          <div class="col-auto">
            <form action="/katalog" method="GET">
              <input type="search" id="inputSearch" name="search" class="form-control" aria-describedby="passwordHelpInline">
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

      <div class="row">
      <!-- @if($message = Session::get('sukses'))
        <div class="alert alert-success" role="alert">
            {{$message}}
        </div>
      @endif -->

        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Foto</th>
              <th scope="col">Deskripsi</th>
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
              <td>{{$row->harga}}</td>
              <td>{{$row->created_at-> format('D M Y') }}</td>
              <td>{{$row->updated_at-> diffForHumans()}}</td>
              <td>
                <a href ="/tampilDataBarang/{{$row->id}}" class="btn btn-info">Edit</a>
                <a href="#" type="button" class="btn btn-danger delete" data-id="{{$row->id}}" data-namaBarang="{{$row->namaBarang}}">Delete</a>
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
        {{ $data->links() }}
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Import file (.xlsx)</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/importExcel"  method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
            <div class="form-group">
                <input type="file" name="file" required>
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
  <script>
    $('.delete').click(function(){
        var katalogid = $(this).attr('data-id');
        var namaBrg = $(this).attr('data-namaBarang');

        Swal.fire({
            title: "Apakah Anda Yakin?",
            text: "Kamu akan menghapus data "+namaBrg+" ",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus Data!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location ="/deleteDataBarang/"+katalogid+"";
                // Swal.fire({
                //     title: "Berhasil Dihapus!",
                //     text: "Data Katalog Telah Dihapus.",
                //     icon: "success"
                // });
            }
        });
    });
  </script>

  <script>
    @if(Session::has('sukses'))
      toastr.success("{{Session::get('sukses')}}")
    @endif
  </script>
@stack('scripts')
</html>
