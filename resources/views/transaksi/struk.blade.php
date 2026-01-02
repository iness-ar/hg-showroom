<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struk Transaksi</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        .struk { width: 350px; margin: 20px auto; padding: 15px; border: 1px solid #000; }
        .line { border-top: 1px dashed #000; margin: 8px 0; }
        .total { font-weight: bold; font-size: 14px; text-align: right; }
    </style>
</head>
<body>
    <div class="struk">
        <h2>HG SHOWROOM</h2>
        <h3>Struk Transaksi Mobil Bekas</h3>

        <div class="line"></div>

        <p>Mobil: {{ $transaksi->mobil->nama_mobil }} ({{ $transaksi->mobil->no_polisi }})</p>
        <p>Merk: {{ $transaksi->mobil->merk->nama_merk }}</p>
        <p>Tipe: {{ $transaksi->mobil->tipe_mobil }}</p>
        <p>Harga: Rp {{ number_format($transaksi->mobil->harga_jual,0,',','.') }}</p>

        <div class="line"></div>

        <p class="total">Total Bayar: Rp {{ number_format($transaksi->mobil->harga_jual,0,',','.') }}</p>

        <button onclick="window.print()">Cetak Struk</button>
    </div>
</body>
</html>
