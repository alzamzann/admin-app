<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lighter Tech</title>
    <link rel="stylesheet" href="{{ asset('assets/css/ecom.css') }}">
</head>
<body>

    <div class="container">
        <nav>
            <img src="{{ asset('img/Lighter_Tech_Logo.png') }}" class="logo" />
            <ul id="sidemenu">
                <li><a href="/lighter-tech">Home</a></li>
                <li><a href="#hardware">Hardware</a></li>
                <li><a href="#software">Software</a></li>
                <li><a href="#lainnya">Lain-Lain</a></li>
            </ul>
        </nav>
    </div>
    <div id="header">
</div>
    <main>
        <section id="hardware">
            <h2>Hardware</h2>
            <div class="menu-items">
                @foreach ($ecomHardware as $itemHardware)
                <div class="item">
                    <img src="{{ asset('fotoBarang/' . $itemHardware->foto) }}" alt="{{ $itemHardware->namaBarang }}">
                    <p class="nama-item">{{ $itemHardware->namaBarang }}</p>
                    <h5>Deskripsi</h5>
                    <p class="deskripsi">{{ $itemHardware->deskripsi }}</p>
                    <p class="harga">Rp {{ number_format($itemHardware->harga, 0, ',', '.') }}</p>
                    <button class="btn-tambah" onclick="tambahKeKeranjang('{{ $itemHardware->namaBarang }}', {{ $itemHardware->harga }})">Tambahkan</button>
                </div>
                @endforeach
            </div>
        </section>
        <section id="software">
            <h2>Software</h2>
            <div class="menu-items">
                @foreach ($ecomSoftware as $itemSoftware)
                <div class="item">
                    <img src="{{ asset('fotoBarang/' . $itemSoftware->foto) }}" alt="{{ $itemSoftware->namaBarang }}">
                    <p class="nama-item">{{ $itemSoftware->namaBarang }}</p>
                    <h5>Deskripsi</h5>
                    <p class="deskripsi">{{ $itemSoftware->deskripsi }}</p>
                    <p class="harga">Rp {{ number_format($itemSoftware->harga, 0, ',', '.') }}</p>
                    <button class="btn-tambah" onclick="tambahKeKeranjang('{{ $itemSoftware->namaBarang }}', {{ $itemSoftware->harga }})">Tambahkan</button>
                </div>
                @endforeach
            </div>
        </section>
        <div class="form">
            <div class="tab-content">
              <div id="signup">
                <h1>Masukan Data Diri Anda</h1>

            <form action="/" method="post">
                <div class="top-row">
                  <div class="field-wrap">
                    <label>
                      Nama<span class="req">*</span>
                    </label><br>
                    <input type="text" required autocomplete="off" name="firstname" id="firstname"  />
                  </div>
                </div>
                <div class="field-wrap">
                  <label>
                    Alamat<span class="req">*</span>
                  </label><br>
                  <input type="text"required autocomplete="off" id="alamat" />
                </div>
                <div class="field-wrap">
                  <label>
                    Nomor Whatsapp<span class="req">*</span>
                  </label><br>
                  <input type="text"required autocomplete="off" id="nomor" />
                </div>
            </form>
        <aside class="keranjang">
            <h2>Keranjang</h2>
            <ul id="keranjang-items">

            </ul>
            <p>Total Harga: <span id="total-harga">Rp 0</span></p>
            <button class="btn-selesai" onclick="selesaiPesan()">PESANAN SELESAI</button>
        </aside>
    </main>
    </div>
    <script src="{{ asset('assets/js/ecom.js') }}"></script>
</body>
</html>
