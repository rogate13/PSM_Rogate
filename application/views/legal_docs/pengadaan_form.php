<!-- legal_docs/pengadaan_form.php -->

<div class="container">
    <h1>Editor Surat Perjanjian Pengadaan Barang</h1>

    <div class="row">
        <div class="col-md-6">
            <!-- Form Section -->
            <div class="form-section">
                <form method="post">
                    <div class="form-group">
                        <label for="judul">Judul Perjanjian:</label>
                        <input type="text" id="judul" name="judul" placeholder="Masukkan judul perjanjian"
                            value="<?php echo set_value('judul', isset($form_data['judul']) ? $form_data['judul'] : 'SURAT PERJANJIAN PENGADAAN BARANG'); ?>"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal Pembuatan:</label>
                        <input type="text" id="tanggal" name="tanggal" placeholder="Masukkan tanggal pembuatan"
                            value="<?php echo set_value('tanggal', isset($form_data['tanggal']) ? $form_data['tanggal'] : 'Kamis, 16 Mei 2025'); ?>"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="tempat">Tempat Pembuatan:</label>
                        <input type="text" id="tempat" name="tempat" placeholder="Masukkan tempat pembuatan"
                            value="<?php echo set_value('tempat', isset($form_data['tempat']) ? $form_data['tempat'] : 'Kota Bandung'); ?>"
                            class="form-control">
                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="nama_pihak1">Nama Pihak Pertama:</label>
                        <input type="text" id="nama_pihak1" name="nama_pihak1" placeholder="Masukkan nama pihak pertama"
                            value="<?php echo set_value('nama_pihak1', isset($form_data['nama_pihak1']) ? $form_data['nama_pihak1'] : 'PT. Maju Jaya'); ?>"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="ktp_pihak1">No. KTP Pihak Pertama:</label>
                        <input type="text" id="ktp_pihak1" name="ktp_pihak1" placeholder="Masukkan no. KTP pihak pertama"
                            value="<?php echo set_value('ktp_pihak1', isset($form_data['ktp_pihak1']) ? $form_data['ktp_pihak1'] : '1234567890'); ?>"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="alamat_pihak1">Alamat Pihak Pertama:</label>
                        <input type="text" id="alamat_pihak1" name="alamat_pihak1" placeholder="Masukkan alamat pihak pertama"
                            value="<?php echo set_value('alamat_pihak1', isset($form_data['alamat_pihak1']) ? $form_data['alamat_pihak1'] : 'Jl. Contoh No. 1'); ?>"
                            class="form-control">
                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="nama_pihak2">Nama Pihak Kedua:</label>
                        <input type="text" id="nama_pihak2" name="nama_pihak2" placeholder="Masukkan nama pihak kedua"
                            value="<?php echo set_value('nama_pihak2', isset($form_data['nama_pihak2']) ? $form_data['nama_pihak2'] : 'CV. Sukses Selalu'); ?>"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="ktp_pihak2">No. KTP Pihak Kedua:</label>
                        <input type="text" id="ktp_pihak2" name="ktp_pihak2" placeholder="Masukkan no. KTP pihak kedua"
                            value="<?php echo set_value('ktp_pihak2', isset($form_data['ktp_pihak2']) ? $form_data['ktp_pihak2'] : '0987654321'); ?>"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="alamat_pihak2">Alamat Pihak Kedua:</label>
                        <input type="text" id="alamat_pihak2" name="alamat_pihak2" placeholder="Masukkan alamat pihak kedua"
                            value="<?php echo set_value('alamat_pihak2', isset($form_data['alamat_pihak2']) ? $form_data['alamat_pihak2'] : 'Jl. Lain No. 2'); ?>"
                            class="form-control">
                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="pasal1">Pasal 1 (Maksud dan Tujuan):</label>
                        <textarea id="pasal1" name="pasal1" placeholder="Masukkan pasal 1"
                            class="form-control"><?php echo set_value('pasal1', isset($form_data['pasal1']) ? $form_data['pasal1'] : 'Pihak Pertama menyanggupi menyediakan barang kepada Pihak Kedua.'); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="pasal2">Pasal 2 (Objek Perjanjian):</label>
                        <textarea id="pasal2" name="pasal2" placeholder="Masukkan pasal 2"
                            class="form-control"><?php echo set_value('pasal2', isset($form_data['pasal2']) ? $form_data['pasal2'] : 'Objek perjanjian adalah pengadaan barang-barang tertentu.'); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="pasal3">Pasal 3 (Ruang Lingkup):</label>
                        <textarea id="pasal3" name="pasal3" placeholder="Masukkan pasal 3"
                            class="form-control"><?php echo set_value('pasal3', isset($form_data['pasal3']) ? $form_data['pasal3'] : 'Ruang lingkup meliputi jenis, jumlah, dan spesifikasi barang.'); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="pasal4">Pasal 4 (Hak dan Kewajiban):</label>
                        <textarea id="pasal4" name="pasal4" placeholder="Masukkan pasal 4"
                            class="form-control"><?php echo set_value('pasal4', isset($form_data['pasal4']) ? $form_data['pasal4'] : 'Pihak Pertama berhak menerima pembayaran, Pihak Kedua berkewajiban membayar.'); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="pasal5">Pasal 5 (Pelaksanaan):</label>
                        <textarea id="pasal5" name="pasal5" placeholder="Masukkan pasal 5"
                            class="form-control"><?php echo set_value('pasal5', isset($form_data['pasal5']) ? $form_data['pasal5'] : 'Pelaksanaan dilakukan sesuai jadwal yang disepakati.'); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="pasal6">Pasal 6 (Jangka Waktu):</label>
                        <textarea id="pasal6" name="pasal6" placeholder="Masukkan pasal 6"
                            class="form-control"><?php echo set_value('pasal6', isset($form_data['pasal6']) ? $form_data['pasal6'] : 'Perjanjian berlaku selama 1 tahun.'); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="penutup_tanggal">Tanggal Penutupan:</label>
                        <input type="text" id="penutup_tanggal" name="penutup_tanggal" placeholder="Masukkan tanggal penutupan"
                            value="<?php echo set_value('penutup_tanggal', isset($form_data['penutup_tanggal']) ? $form_data['penutup_tanggal'] : 'Bandung, 16 Mei 2025'); ?>"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="nama_ttd_pihak1">Nama Penandatangan Pihak Pertama:</label>
                        <input type="text" id="nama_ttd_pihak1" name="nama_ttd_pihak1" placeholder="Masukkan nama penandatangan pihak pertama"
                            value="<?php echo set_value('nama_ttd_pihak1', isset($form_data['nama_ttd_pihak1']) ? $form_data['nama_ttd_pihak1'] : 'John Doe'); ?>"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="nama_ttd_pihak2">Nama Penandatangan Pihak Kedua:</label>
                        <input type="text" id="nama_ttd_pihak2" name="nama_ttd_pihak2" placeholder="Masukkan nama penandatangan pihak kedua"
                            value="<?php echo set_value('nama_ttd_pihak2', isset($form_data['nama_ttd_pihak2']) ? $form_data['nama_ttd_pihak2'] : 'Jane Smith'); ?>"
                            class="form-control">
                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="saksi1">Saksi 1:</label>
                        <input type="text" id="saksi1" name="saksi1" placeholder="Masukkan nama saksi 1"
                            value="<?php echo set_value('saksi1', isset($form_data['saksi1']) ? $form_data['saksi1'] : 'Alice'); ?>"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="saksi2">Saksi 2:</label>
                        <input type="text" id="saksi2" name="saksi2" placeholder="Masukkan nama saksi 2"
                            value="<?php echo set_value('saksi2', isset($form_data['saksi2']) ? $form_data['saksi2'] : 'Bob'); ?>"
                            class="form-control">
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary" onclick="generatePreview()">Generate Preview</button>
                    <button type="button" class="btn btn-primary" onclick="downloadPreview()">Download Preview</button>

                </form>
            </div>
        </div>

        <div class="col-md-6">
            <!-- Preview Section -->
            <h3>Preview Surat Perjanjian</h3>
            <iframe id="preview" style="width: 100%; height: 800px;"></iframe>
        </div>
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
                        <p><b>Pasal 6 (Jangka Waktu):</b><br>${pasal6 || '__________'}</p>
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

        // Buat Blob dari HTML
        const blob = new Blob([html], {
            type: 'text/html'
        });

        // Buat URL untuk Blob
        const url = URL.createObjectURL(blob);

        // Buat element link untuk download
        const a = document.createElement('a');
        a.href = url;
        a.download = `${judul || 'Perjanjian'}.html`; // Nama file untuk diunduh
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);

        // Revoke URL
        URL.revokeObjectURL(url);
    }

    // Generate otomatis saat pertama kali load
    window.onload = generatePreview;
</script>