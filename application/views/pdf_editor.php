<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Editor Surat Perjanjian Kerjasama</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .container {
            display: flex;
            gap: 20px;
            width: 100%;
        }

        .form-section {
            flex: 1;
            background: #f5f5f5;
            padding: 20px;
            border-radius: 5px;
        }

        .preview-section {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        #preview {
            width: 100%;
            height: 600px;
            border: 1px solid #ccc;
            margin-top: 20px;
        }

        h1 {
            text-align: center;
            margin-top: 0;
            color: #333;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h1>Editor Surat Perjanjian Kerjasama</h1>

    <div class="container">
        <div class="form-section">
            <div class="form-group">
                <label for="judul">Judul Perjanjian:</label>
                <input type="text" id="judul" placeholder="Masukkan judul perjanjian"
                    value="SURAT PERJANJIAN KERJASAMA PENGADAAN BAHAN PAKAIAN DINAS DAN ATRIBUT">
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal Pembuatan:</label>
                <input type="text" id="tanggal" placeholder="Masukkan tanggal pembuatan" value="Kamis, 28 Desember 2018">
            </div>

            <div class="form-group">
                <label for="tempat">Tempat Pembuatan:</label>
                <input type="text" id="tempat" placeholder="Masukkan tempat pembuatan" value="Kota Jakarta">
            </div>

            <hr>

            <div class="form-group">
                <label for="nama_pihak1">Nama Pihak Pertama:</label>
                <input type="text" id="nama_pihak1" placeholder="Masukkan nama pihak pertama"
                    value="Ahmad Munas Maulana">
            </div>

            <div class="form-group">
                <label for="ktp_pihak1">No. KTP Pihak Pertama:</label>
                <input type="text" id="ktp_pihak1" placeholder="Masukkan no. KTP pihak pertama"
                    value="3204092210570003">
            </div>

            <div class="form-group">
                <label for="alamat_pihak1">Alamat Pihak Pertama:</label>
                <input type="text" id="alamat_pihak1" placeholder="Masukkan alamat pihak pertama"
                    value="Permata Kopo Blok E No.87 Sayati Margahayu Kab. Bandung">
            </div>

            <hr>

            <div class="form-group">
                <label for="nama_pihak2">Nama Pihak Kedua:</label>
                <input type="text" id="nama_pihak2" placeholder="Masukkan nama pihak kedua"
                    value="DR. Arifin Tasrif, MSc, MM">
            </div>

            <div class="form-group">
                <label for="ktp_pihak2">No. KTP Pihak Kedua:</label>
                <input type="text" id="ktp_pihak2" placeholder="Masukkan no. KTP pihak kedua"
                    value="31750605502790002">
            </div>

            <div class="form-group">
                <label for="alamat_pihak2">Alamat Pihak Kedua:</label>
                <input type="text" id="alamat_pihak2" placeholder="Masukkan alamat pihak kedua"
                    value="Vila Bogor Indah Blok CC 20/24 Ciparigi Kota Bogor">
            </div>

            <hr>

            <div class="form-group">
                <label for="pasal1">Pasal 1 (Maksud dan Tujuan):</label>
                <textarea id="pasal1"
                    placeholder="Masukkan pasal 1">Maksud dan tujuan perjanjian kerjasama ini adalah PARA PIHAK sepakat untuk melakukan kerjasama usaha bahan pakaian dinas dan atribut serta lainnya.</textarea>
            </div>

            <div class="form-group">
                <label for="pasal2">Pasal 2 (Objek Perjanjian):</label>
                <textarea id="pasal2"
                    placeholder="Masukkan pasal 2">Objek Perjanjian kerjasama ini adalah berupa pengelolaan pemesanan, harga, system pembayaran dan sangsi sangsi.</textarea>
            </div>

            <div class="form-group">
                <label for="pasal3">Pasal 3 (Ruang Lingkup):</label>
                <textarea id="pasal3"
                    placeholder="Masukkan pasal 3">1. PARA PIHAK sepakat bahwa dalam kerjasama ini membagi kewajiban, dimana PIHAK PERTAMA menyediakan bahan dan atribut .
2. Dan PIHAK KEDUA akan membayar sesuai pesanan dan mengoptimalkan kemampuan, pengalaman dan jaringan usaha.</textarea>
            </div>

            <div class="form-group">
                <label for="pasal4">Pasal 4 (Hak dan Kewajiban):</label>
                <textarea id="pasal4"
                    placeholder="Masukkan pasal 4">PIHAK PERTAMA berkewajiban:
1. Menyediakan dana sebesar 50 % untuk besaran produksi yang dipesan.
2. Memberikan kewenangan kepada pihak kedua untuk mengatur sistem penjualan sebagaimana mestinya.
3. Menyediakan bahan pakaian dan atribut sesuai yang diperjanjikan (terlampir), yang tidak terpisahkan dari perjanjian ini.

PIHAK PERTAMA berhak :
1. Menerima pembayaran 50% sebelum barang diproduksi sesuai jumlah pesanan.
2. Menerima orderan secara tertulis dan ditandatangani pihak pemesan.
3. Menghentikan produksi dan suplai apabila tidak terpenuhi sebagaiamana poin satu diatas.
4. Menerima pembayaran 100 persen apabila barang sudah diterima pemesan paling lambat 1(satu) bulan..

PIHAK KEDUA berkewajiban :
1. Melakukan pemasaran bahan dan atribut.
2. Membayar 50% dari setiap jumlah nilai pesanan.

PIHAK KEDUA berhak :
1. Menerima potongan harga sesuai kesepakan harga sejak pertama perjanjian PIHAK PERTAMA dengan PIHAK KEDUA ditanda tangani
2. Menerima total modal dari PIHAK PERTAMA sesuai jumlah yang telah terbayarkan pada saat perjanjian ini berakhir.
3. Mengembalikan barang yang telah diterima apabila tidak sesuai dengan pesanan.</textarea>
            </div>

            <div class="form-group">
                <label for="pasal5">Pasal 5 (Pelaksanaan):</label>
                <textarea id="pasal5"
                    placeholder="Masukkan pasal 5">1. Dana disiapkan PIHAK PERTAMA dan PIHAK KEDUA
2. Dana dikeluarkan sesuai dengan keperluan PIHAK KEDUA untuk jumlah pesanan.</textarea>
            </div>

            <div class="form-group">
                <label for="pasal6">Pasal 6 (Bagi Hasil):</label>
                <textarea id="pasal6"
                    placeholder="Masukkan pasal 6">PIHAK PERTAMA mendapatkan bagi hasil sesuai jenis barang yang diperjanjikan (terlampir).</textarea>
            </div>

            <div class="form-group">
                <label for="pasal7">Pasal 7 (Jangka Waktu):</label>
                <textarea id="pasal7"
                    placeholder="Masukkan pasal 7">Perjanjian kerjasama ini berlaku untuk jangka waktu 1 (satu) tahun, terhitung mulai tanggal 28 Desember 2018 sampai dengan tanggal 28 Desember 2020.</textarea>
            </div>

            <div class="form-group">
                <label for="pasal8">Pasal 8 (Berakhirnya Perjanjian):</label>
                <textarea id="pasal8"
                    placeholder="Masukkan pasal 8">PARA PIHAK sepakat bahwa Perjanjian Kerjasama ini berakhir bilamana :
1. Jangka waktu Perjanjian Kerjasama ini telah berakhir dan tidak diperpanjang lagi.
2. Salah satu pihak tidak memenuhi salah satu ketentuan dalam pasal-pasal serta ayat-ayat Perjanjian Kerjasama ini.
3. Force Majeur yang menyebabkan tidak mungkin dilaksanakannya kembali Perjanjian Kerjasama ini.</textarea>
            </div>

            <div class="form-group">
                <label for="pasal9">Pasal 9 (Perselisihan):</label>
                <textarea id="pasal9"
                    placeholder="Masukkan pasal 9">Apabila dikemudian hari timbul perselisihan dalam pelaksanaan Perjanjian Kerjasama ini, kedua belah pihak sepakat untuk menyelesaikan melalui jalan musyawarah dan mufakat.</textarea>
            </div>

            <div class="form-group">
                <label for="pasal10">Pasal 10 (Ketentuan Lain-Lain):</label>
                <textarea id="pasal10"
                    placeholder="Masukkan pasal 10">1. Ketentuan yang tidak tercantum dalam perjanjian harus dicantumkan dalam perjanjian terpisah yang disepakati oleh PARA PIHAK atas dasar niat baik.
2. Setiap addendum pada perjanjian ini harus dituangkan secara tertulis dan ditandatangani oleh PARA PIHAK.
3. Perjanjian ini ditujukan bagi pihak-pihak yang tercantum dalam perjanjian ini dan pihak lain yang ditujukan dan disepakati oleh PARA PIHAK, serta tidak dapat dialihkan kepada pihak lain tanpa kesepakatan PARA PIHAK.
4. PARA PIHAK sepakat untuk menjaga kerahasiaan ini, kecuali bila dinyatakan untuk dibuka berdasarkan hukum yang berlaku.</textarea>
            </div>

            <hr>

            <div class="form-group">
                <label for="penutup_tanggal">Tanggal Penutupan:</label>
                <input type="text" id="penutup_tanggal" placeholder="Masukkan tanggal penutupan"
                    value="Bandung, 28 Desember 2018">
            </div>

            <div class="form-group">
                <label for="nama_ttd_pihak1">Nama Penandatangan Pihak Pertama:</label>
                <input type="text" id="nama_ttd_pihak1" placeholder="Masukkan nama penandatangan pihak pertama"
                    value="Ahmad Munas Maulana">
            </div>

            <div class="form-group">
                <label for="nama_ttd_pihak2">Nama Penandatangan Pihak Kedua:</label>
                <input type="text" id="nama_ttd_pihak2" placeholder="Masukkan nama penandatangan pihak kedua"
                    value="DR. Arifin Tasrif, MSc,MM">
            </div>

            <hr>

            <div class="form-group">
                <label for="saksi1">Saksi 1:</label>
                <input type="text" id="saksi1" placeholder="Masukkan nama saksi 1" value="Dedi Sudrajat">
            </div>

            <div class="form-group">
                <label for="saksi2">Saksi 2:</label>
                <input type="text" id="saksi2" placeholder="Masukkan nama saksi 2" value="Islana">
            </div>

            <button onclick="generatePreview()">Generate Preview</button>
        </div>

        <div class="preview-section">
            <h3>Preview Surat Perjanjian</h3>
            <iframe id="preview"></iframe>
            <button onclick="downloadPreview()">Download Preview</button>
        </div>
    </div>

    <script>
        function generatePreview() {
            // Ambil nilai dari form
            const judul = document.getElementById('judul').value;
            const tanggal = document.getElementById('tanggal').value;
            const tempat = document.getElementById('tempat').value;
            const namaPihak1 = document.getElementById('nama_pihak1').value;
            const ktpPihak1 = document.getElementById('ktp_pihak1').value;
            const alamatPihak1 = document.getElementById('alamat_pihak1').value;
            const namaPihak2 = document.getElementById('nama_pihak2').value;
            const ktpPihak2 = document.getElementById('ktp_pihak2').value;
            const alamatPihak2 = document.getElementById('alamat_pihak2').value;
            const pasal1 = document.getElementById('pasal1').value;
            const pasal2 = document.getElementById('pasal2').value;
            const pasal3 = document.getElementById('pasal3').value;
            const pasal4 = document.getElementById('pasal4').value;
            const pasal5 = document.getElementById('pasal5').value;
            const pasal6 = document.getElementById('pasal6').value;
            const pasal7 = document.getElementById('pasal7').value;
            const pasal8 = document.getElementById('pasal8').value;
            const pasal9 = document.getElementById('pasal9').value;
            const pasal10 = document.getElementById('pasal10').value;
            const penutupTanggal = document.getElementById('penutup_tanggal').value;
            const namaTtdPihak1 = document.getElementById('nama_ttd_pihak1').value;
            const namaTtdPihak2 = document.getElementById('nama_ttd_pihak2').value;
            const saksi1 = document.getElementById('saksi1').value;
            const saksi2 = document.getElementById('saksi2').value;

            // Buat template HTML untuk preview
            const html = `
                <div style="font-family: Arial; max-width: 800px; margin: 0 auto; padding: 20px;">
                    <h2 style="text-align: center; text-decoration: underline;">${judul || '__________'}</h2>
                    <p style="text-align: center;">Pada hari ${tanggal || '__________'}, bertempat di ${tempat || '__________'}, telah ditandatangani perjanjian kerjasama antara:</p>

                    <table style="margin-left: 50px; margin-top: 20px;">
                        <tr>
                            <td style="width: 150px;">Nama</td>
                            <td>: ${namaPihak1 || '__________'}</td>
                        </tr>
                        <tr>
                            <td>No. KTP</td>
                            <td>: ${ktpPihak1 || '__________'}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: ${alamatPihak1 || '__________'}</td>
                        </tr>
                    </table>

                    <p style="margin-top: 10px;">Bertindak atas nama pribadi, selanjutnya disebut sebagai <b>PIHAK PERTAMA</b></p>

                    <table style="margin-left: 50px; margin-top: 20px;">
                        <tr>
                            <td style="width: 150px;">Nama</td>
                            <td>: ${namaPihak2 || '__________'}</td>
                        </tr>
                        <tr>
                            <td>No. KTP</td>
                            <td>: ${ktpPihak2 || '__________'}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: ${alamatPihak2 || '__________'}</td>
                        </tr>
                    </table>

                    <p style="margin-top: 10px;">Bertindak atas nama pribadi, selanjutnya disebut sebagai <b>PIHAK KEDUA</b>.</p>

                    <h3 style="text-align: center; margin-top: 30px;">Pasal-Pasal</h3>
                    <div style="margin-left: 50px;">
                        <p><b>Pasal 1 (Maksud dan Tujuan):</b><br>${pasal1 || '__________'}</p>
                        <p><b>Pasal 2 (Objek Perjanjian):</b><br>${pasal2 || '__________'}</p>
                        <p><b>Pasal 3 (Ruang Lingkup):</b><br>${pasal3 || '__________'}</p>
                        <p><b>Pasal 4 (Hak dan Kewajiban):</b><br>${pasal4 || '__________'}</p>
                        <p><b>Pasal 5 (Pelaksanaan):</b><br>${pasal5 || '__________'}</p>
                        <p><b>Pasal 6 (Bagi Hasil):</b><br>${pasal6 || '__________'}</p>
                        <p><b>Pasal 7 (Jangka Waktu):</b><br>${pasal7 || '__________'}</p>
                        <p><b>Pasal 8 (Berakhirnya Perjanjian):</b><br>${pasal8 || '__________'}</p>
                        <p><b>Pasal 9 (Perselisihan):</b><br>${pasal9 || '__________'}</p>
                        <p><b>Pasal 10 (Ketentuan Lain-Lain):</b><br>${pasal10 || '__________'}</p>
                    </div>

                    <div style="margin-top: 50px; text-align: center;">
                        <p>${tempat || '__________'}, ${penutupTanggal || '__________'}</p>
                        <table style="width: 100%; margin-top: 20px;">
                            <tr>
                                <td style="text-align: center;">
                                    Pihak Pertama,<br><br><br><br>
                                    ${namaTtdPihak1 || '__________'}
                                </td>
                                <td style="text-align: center;">
                                    Pihak Kedua,<br><br><br><br>
                                    ${namaTtdPihak2 || '__________'}
                                </td>
                            </tr>
                        </table>

                        <h4 style="text-align: center; margin-top: 30px;">Saksi-saksi:</h4>
                        <table style="width: 100%;">
                            <tr>
                                <td style="text-align: center;">Saksi 1:<br><br>${saksi1 || '__________'}</td>
                                <td style="text-align: center;">Saksi 2:<br><br>${saksi2 || '__________'}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            `;

            // Tampilkan preview di iframe
            const previewFrame = document.getElementById('preview');
            previewFrame.contentDocument.body.innerHTML = html;
        }

        function downloadPreview() {
            const judul = document.getElementById('judul').value;
            const tanggal = document.getElementById('tanggal').value;
            const tempat = document.getElementById('tempat').value;
            const namaPihak1 = document.getElementById('nama_pihak1').value;
            const ktpPihak1 = document.getElementById('ktp_pihak1').value;
            const alamatPihak1 = document.getElementById('alamat_pihak1').value;
            const namaPihak2 = document.getElementById('nama_pihak2').value;
            const ktpPihak2 = document.getElementById('ktp_pihak2').value;
            const alamatPihak2 = document.getElementById('alamat_pihak2').value;
            const pasal1 = document.getElementById('pasal1').value;
            const pasal2 = document.getElementById('pasal2').value;
            const pasal3 = document.getElementById('pasal3').value;
            const pasal4 = document.getElementById('pasal4').value;
            const pasal5 = document.getElementById('pasal5').value;
            const pasal6 = document.getElementById('pasal6').value;
            const pasal7 = document.getElementById('pasal7').value;
            const pasal8 = document.getElementById('pasal8').value;
            const pasal9 = document.getElementById('pasal9').value;
            const pasal10 = document.getElementById('pasal10').value;
            const penutupTanggal = document.getElementById('penutup_tanggal').value;
            const namaTtdPihak1 = document.getElementById('nama_ttd_pihak1').value;
            const namaTtdPihak2 = document.getElementById('nama_ttd_pihak2').value;
            const saksi1 = document.getElementById('saksi1').value;
            const saksi2 = document.getElementById('saksi2').value;

            const html = `
                <div style="font-family: Arial; max-width: 800px; margin: 0 auto; padding: 20px;">
                    <h2 style="text-align: center; text-decoration: underline;">${judul || '__________'}</h2>
                    <p style="text-align: center;">Pada hari ${tanggal || '__________'}, bertempat di ${tempat || '__________'}, telah ditandatangani perjanjian kerjasama antara:</p>

                    <table style="margin-left: 50px; margin-top: 20px;">
                        <tr>
                            <td style="width: 150px;">Nama</td>
                            <td>: ${namaPihak1 || '__________'}</td>
                        </tr>
                        <tr>
                            <td>No. KTP</td>
                            <td>: ${ktpPihak1 || '__________'}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: ${alamatPihak1 || '__________'}</td>
                        </tr>
                    </table>

                    <p style="margin-top: 10px;">Bertindak atas nama pribadi, selanjutnya disebut sebagai <b>PIHAK PERTAMA</b></p>

                    <table style="margin-left: 50px; margin-top: 20px;">
                        <tr>
                            <td style="width: 150px;">Nama</td>
                            <td>: ${namaPihak2 || '__________'}</td>
                        </tr>
                        <tr>
                            <td>No. KTP</td>
                            <td>: ${ktpPihak2 || '__________'}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: ${alamatPihak2 || '__________'}</td>
                        </tr>
                    </table>

                    <p style="margin-top: 10px;">Bertindak atas nama pribadi, selanjutnya disebut sebagai <b>PIHAK KEDUA</b>.</p>

                    <h3 style="text-align: center; margin-top: 30px;">Pasal-Pasal</h3>
                    <div style="margin-left: 50px;">
                        <p><b>Pasal 1 (Maksud dan Tujuan):</b><br>${pasal1 || '__________'}</p>
                        <p><b>Pasal 2 (Objek Perjanjian):</b><br>${pasal2 || '__________'}</p>
                        <p><b>Pasal 3 (Ruang Lingkup):</b><br>${pasal3 || '__________'}</p>
                        <p><b>Pasal 4 (Hak dan Kewajiban):</b><br>${pasal4 || '__________'}</p>
                        <p><b>Pasal 5 (Pelaksanaan):</b><br>${pasal5 || '__________'}</p>
                        <p><b>Pasal 6 (Bagi Hasil):</b><br>${pasal6 || '__________'}</p>
                        <p><b>Pasal 7 (Jangka Waktu):</b><br>${pasal7 || '__________'}</p>
                        <p><b>Pasal 8 (Berakhirnya Perjanjian):</b><br>${pasal8 || '__________'}</p>
                        <p><b>Pasal 9 (Perselisihan):</b><br>${pasal9 || '__________'}</p>
                        <p><b>Pasal 10 (Ketentuan Lain-Lain):</b><br>${pasal10 || '__________'}</p>
                    </div>

                    <div style="margin-top: 50px; text-align: center;">
                        <p>${tempat || '__________'}, ${penutupTanggal || '__________'}</p>
                        <table style="width: 100%; margin-top: 20px;">
                            <tr>
                                <td style="text-align: center;">
                                    Pihak Pertama,<br><br><br><br>
                                    ${namaTtdPihak1 || '__________'}
                                </td>
                                <td style="text-align: center;">
                                    Pihak Kedua,<br><br><br><br>
                                    ${namaTtdPihak2 || '__________'}
                                </td>
                            </tr>
                        </table>

                        <h4 style="text-align: center; margin-top: 30px;">Saksi-saksi:</h4>
                        <table style="width: 100%;">
                            <tr>
                                <td style="text-align: center;">Saksi 1:<br><br>${saksi1 || '__________'}</td>
                                <td style="text-align: center;">Saksi 2:<br><br>${saksi2 || '__________'}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            `;
            const blob = new Blob([html], {
                type: 'text/html'
            });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = judul + '.html';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        }

        // Generate otomatis saat pertama kali load
        window.onload = generatePreview;
    </script>
</body>

</html>