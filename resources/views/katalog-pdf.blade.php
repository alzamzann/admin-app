<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Data Katalog</h1>

<table id="customers">
    <tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Foto</th>
        <th>Deskripsi</th>
        <th>Harga</th>
        <th>Tanggal Ditambahkan</th>
        <th>Tanggal Diperbarui</th>
    </tr>
    @php
    $no = 1;
    @endphp
    @foreach ($data as $index => $row)
    <tr>
        <td>{{ $no++ }}</td>
        <td>{{ $row->namaBarang }}</td>
        <td><img src="{{ public_path('fotoBarang/'.$row->foto) }}" alt="" style="width: 40px;"></td>
        <td>{{ $row->deskripsi }}</td>
        <td>{{ $row->harga }}</td>
        <td>{{ $row->created_at->format('D M Y') }}</td>
        <td>{{ $row->updated_at->diffForHumans() }}</td>
    </tr>
    @endforeach
</table>

</body>
</html>
