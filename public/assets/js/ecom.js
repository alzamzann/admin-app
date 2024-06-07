let keranjang = {};
let totalHarga = 0;

function tambahKeKeranjang(item, harga) {
    if (keranjang[item]) {
        keranjang[item].jumlah++;
    } else {
        keranjang[item] = { harga: harga, jumlah: 1 };
    }
    totalHarga += harga;
    updateKeranjang();
}

function updateKeranjang() {
    const keranjangItems = document.getElementById('keranjang-items');
    keranjangItems.innerHTML = '';
    Object.keys(keranjang).forEach(nama => {
        const item = keranjang[nama];
        const li = document.createElement('li');
        li.textContent = `${nama} - ${formatRupiah(item.harga)} x ${item.jumlah}pcs = ${formatRupiah(item.harga * item.jumlah)} `;
        keranjangItems.appendChild(li);
    });

    const totalHargaSpan = document.getElementById('total-harga');
    totalHargaSpan.textContent = formatRupiah(totalHarga);
}

function selesaiPesan() {
    const firstName = document.querySelector("#firstname").value;
    const alamat = document.querySelector("#alamat").value;
    const nowa = document.querySelector("#nomor").value;
    let isiKeranjang = Object.keys(keranjang).map(nama => {
        const item = keranjang[nama];
        return `${nama} - ${formatRupiah(item.harga)} x ${item.jumlah}pcs = ${formatRupiah(item.harga * item.jumlah)}`;
    }).join('\n');

    const data = {
        "session": "mysession",
        "to": nowa,
        "text": `Nama: ${firstName}\nAlamat: ${alamat}\n\nKeranjang:\n${isiKeranjang}\n\nTotal Harga: ${formatRupiah(totalHarga)}`
    }

    fetch("http://localhost:5001/send-message", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Jaringan bermasalah');
        }
        return response.json();
    })
    .then(data => {
        console.log(data);
        alert('Terima kasih atas pesanan Anda! Silakan tunggu pesanan anda sampai.');
    })
    .catch(error => {
        console.error('Terjadi kesalahan:', error);
        alert('Maaf, terjadi kesalahan saat memproses pesanan Anda. Silakan coba lagi.');
    });

    // Reset keranjang dan total harga setelah pesanan selesai
    keranjang = {};
    totalHarga = 0;
    updateKeranjang();
}


function formatRupiah(angka) {
    var reverse = angka.toString().split('').reverse().join(''),
    ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join('.').split('').reverse().join('');
    return 'Rp ' + ribuan;
}
