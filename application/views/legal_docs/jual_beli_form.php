    <div class="container">
        <h1 class="my-4">Editor Surat Perjanjian Kerjasama</h1>

        <div class="row">
            <div class="col-md-6">
                <!-- Form Section -->
                <div class="form-section">
                    <div class="form-group">
                        <label for="judul">Judul Perjanjian:</label>
                        <input type="text" id="judul" placeholder="Masukkan judul perjanjian"
                            value="SURAT PERJANJIAN KERJASAMA PENGADAAN BAHAN PAKAIAN DINAS DAN ATRIBUT" class="form-control">
                    </div>

                    <div class="form-group mt-3">
                        <label for="tanggal">Tanggal Pembuatan:</label>
                        <input type="text" id="tanggal" placeholder="Masukkan tanggal pembuatan" value="Kamis, 28 Desember 2018"
                            class="form-control">
                    </div>

                    <div class="form-group mt-3">
                        <label for="tempat">Tempat Pembuatan:</label>
                        <input type="text" id="tempat" placeholder="Masukkan tempat pembuatan" value="Kota Jakarta"
                            class="form-control">
                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="nama_pihak1">Nama Pihak Pertama:</label>
                        <input type="text" id="nama_pihak1" placeholder="Masukkan nama pihak pertama"
                            value="Ahmad Munas Maulana" class="form-control">
                    </div>

                    <div class="form-group mt-3">
                        <label for="ktp_pihak1">No. KTP Pihak Pertama:</label>
                        <input type="text" id="ktp_pihak1" placeholder="Masukkan no. KTP pihak pertama"
                            value="3204092210570003" class="form-control">
                    </div>

                    <div class="form-group mt-3">
                        <label for="alamat_pihak1">Alamat Pihak Pertama:</label>
                        <input type="text" id="alamat_pihak1" placeholder="Masukkan alamat pihak pertama"
                            value="Permata Kopo Blok E No.87 Sayati Margahayu Kab. Bandung" class="form-control">
                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="nama_pihak2">Nama Pihak Kedua:</label>
                        <input type="text" id="nama_pihak2" placeholder="Masukkan nama pihak kedua"
                            value="DR. Arifin Tasrif, MSc, MM" class="form-control">
                    </div>

                    <div class="form-group mt-3">
                        <label for="ktp_pihak2">No. KTP Pihak Kedua:</label>
                        <input type="text" id="ktp_pihak2" placeholder="Masukkan no. KTP pihak kedua"
                            value="31750605502790002" class="form-control">
                    </div>

                    <div class="form-group mt-3">
                        <label for="alamat_pihak2">Alamat Pihak Kedua:</label>
                        <input type="text" id="alamat_pihak2" placeholder="Masukkan alamat pihak kedua"
                            value="Vila Bogor Indah Blok CC 20/24 Ciparigi Kota Bogor" class="form-control">
                    </div>

                    <hr>

                    <!-- Dynamic Pasal Section -->
                    <h4>Pasal-Pasal:</h4>
                    <div id="pasal-container">
                        <div class="pasal-item">
                            <div class="form-group">
                                <label>Judul Pasal:</label>
                                <input type="text" class="form-control pasal-title" placeholder="Misal: Maksud dan Tujuan" value="Maksud dan Tujuan">
                            </div>
                            <div class="form-group mt-3">
                                <label>Isi Pasal:</label>
                                <textarea class="form-control pasal-content" placeholder="Masukkan isi pasal" rows="3">Maksud dan tujuan perjanjian kerjasama ini adalah PARA PIHAK sepakat untuk melakukan kerjasama usaha bahan pakaian dinas dan atribut serta lainnya.</textarea>
                            </div>
                            <button class="btn btn-danger btn-sm mt-2 remove-pasal">Hapus Pasal</button>
                        </div>

                        <div class="pasal-item mt-3">
                            <div class="form-group">
                                <label>Judul Pasal:</label>
                                <input type="text" class="form-control pasal-title" placeholder="Misal: Objek Perjanjian" value="Objek Perjanjian">
                            </div>
                            <div class="form-group mt-3">
                                <label>Isi Pasal:</label>
                                <textarea class="form-control pasal-content" placeholder="Masukkan isi pasal" rows="3">Objek Perjanjian kerjasama ini adalah berupa pengelolaan pemesanan, harga, system pembayaran dan sangsi sangsi.</textarea>
                            </div>
                            <button class="btn btn-danger btn-sm mt-2 remove-pasal">Hapus Pasal</button>
                        </div>
                    </div>

                    <button id="add-pasal" class="btn btn-info mt-3">Tambah Pasal</button>

                    <!-- Bagian Kesimpulan (Opsional) -->
                    <div class="mt-4">
                        <h4>Kesimpulan (Opsional):</h4>
                        <div class="form-group mt-3">
                            <label for="kesimpulan_title">Judul Kesimpulan:</label>
                            <input type="text" id="kesimpulan_title" placeholder="Misal: Penutup" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label for="kesimpulan_content">Isi Kesimpulan:</label>
                            <textarea id="kesimpulan_content" class="form-control" placeholder="Masukkan isi kesimpulan" rows="3"></textarea>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="penutup_tanggal">Tanggal Penutupan:</label>
                        <input type="text" id="penutup_tanggal" placeholder="Masukkan tanggal penutupan"
                            value="Bandung, 28 Desember 2018" class="form-control">
                    </div>

                    <div class="form-group mt-3">
                        <label for="nama_ttd_pihak1">Nama Penandatangan Pihak Pertama:</label>
                        <input type="text" id="nama_ttd_pihak1" placeholder="Masukkan nama penandatangan pihak pertama"
                            value="Ahmad Munas Maulana" class="form-control">
                    </div>

                    <div class="form-group mt-3">
                        <label for="nama_ttd_pihak2">Nama Penandatangan Pihak Kedua:</label>
                        <input type="text" id="nama_ttd_pihak2" placeholder="Masukkan nama penandatangan pihak kedua"
                            value="DR. Arifin Tasrif, MSc,MM" class="form-control">
                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="saksi1">Saksi 1:</label>
                        <input type="text" id="saksi1" placeholder="Masukkan nama saksi 1" value="Dedi Sudrajat"
                            class="form-control">
                    </div>

                    <div class="form-group mt-3">
                        <label for="saksi2">Saksi 2:</label>
                        <input type="text" id="saksi2" placeholder="Masukkan nama saksi 2" value="Islana"
                            class="form-control">
                    </div>

                    <button onclick="generatePreview()" class="btn btn-primary mt-4">Generate Preview</button>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Preview Section -->
                <div class="preview-section">
                    <h3>Preview Surat Perjanjian</h3>
                    <iframe id="preview" style="width: 100%; height: 800px; border: 1px solid #ced4da; border-radius: 5px;"></iframe>
                    <button onclick="downloadPDF()" class="btn btn-danger mt-3"><i class="fas fa-file-pdf"></i> Download PDF</button>
                    <button onclick="downloadDOCX()" class="btn btn-success mt-3"><i class="fas fa-file-word"></i> Download DOCX</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/docx@7.8.2/build/index.min.js"></script>

    <script>
        // Fungsi untuk menambahkan pasal baru
        document.getElementById('add-pasal').addEventListener('click', function() {
            const pasalContainer = document.getElementById('pasal-container');
            const pasalCount = pasalContainer.querySelectorAll('.pasal-item').length + 1;

            const newPasalItem = document.createElement('div');
            newPasalItem.className = 'pasal-item mt-3';
            newPasalItem.innerHTML = `
            <div class="form-group">
                <label>Judul Pasal:</label>
                <input type="text" class="form-control pasal-title" placeholder="Pasal ${pasalCount}" value="Pasal ${pasalCount}">
            </div>
            <div class="form-group mt-3">
                <label>Isi Pasal:</label>
                <textarea class="form-control pasal-content" placeholder="Masukkan isi pasal" rows="3"></textarea>
            </div>
            <button class="btn btn-danger btn-sm mt-2 remove-pasal">Hapus Pasal</button>
        `;
            pasalContainer.appendChild(newPasalItem);

            // Tambahkan event listener untuk tombol hapus
            newPasalItem.querySelector('.remove-pasal').addEventListener('click', function() {
                pasalContainer.removeChild(newPasalItem);
            });
        });

        // Event delegation untuk tombol hapus pasal
        document.getElementById('pasal-container').addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-pasal')) {
                e.target.closest('.pasal-item').remove();
            }
        });

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
            const penutupTanggal = document.getElementById('penutup_tanggal').value;
            const namaTtdPihak1 = document.getElementById('nama_ttd_pihak1').value;
            const namaTtdPihak2 = document.getElementById('nama_ttd_pihak2').value;
            const saksi1 = document.getElementById('saksi1').value;
            const saksi2 = document.getElementById('saksi2').value;
            const kesimpulanTitle = document.getElementById('kesimpulan_title').value;
            const kesimpulanContent = document.getElementById('kesimpulan_content').value;

            // Kumpulkan semua pasal
            const pasalItems = document.querySelectorAll('.pasal-item');
            let pasalHTML = '';

            pasalItems.forEach((item, index) => {
                const title = item.querySelector('.pasal-title').value || `Pasal ${index + 1}`;
                const content = item.querySelector('.pasal-content').value || '__________';

                pasalHTML += `
            <div style="margin-top: 20px;">
                <h3 style="text-align: center; margin-bottom: 5px;">Pasal ${index + 1}</h3>
                <h4 style="text-align: center; margin-top: 0; margin-bottom: 15px;">${title}</h4>
                <p style="text-align: justify; line-height: 1.6;">${content.replace(/\n/g, '<br>')}</p>
            </div>
        `;
            });

            // Buat template HTML untuk preview
            const html = `
        <!DOCTYPE html>
        <html>

        <head>
            <style>
                body {
                    font-family: "Times New Roman", Times, serif;
                    line-height: 1.6;
                    margin: 0;
                    padding: 20px;
                }

                .document-container {
                    max-width: 800px;
                    margin: 0 auto;
                }

                .header {
                    text-align: center;
                    margin-bottom: 30px;
                }

                .parties {
                    margin-bottom: 30px;
                }

                .signature {
                    margin-top: 50px;
                }

                .signature-table {
                    width: 100%;
                    margin-top: 30px;
                }

                .witnesses {
                    margin-top: 30px;
                }
            </style>
        </head>

        <body>
            <div class="document-container">
                <div class="header">
                    <h2 style="text-decoration: underline; margin-bottom: 10px;">${judul || '__________'}</h2>
                    <p>Pada hari ${tanggal || '__________'}, bertempat di ${tempat || '__________'}, telah
                        ditandatangani perjanjian kerjasama antara:</p>
                </div>

                <div class="parties">
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

                    <p style="margin-top: 10px;">Bertindak atas nama pribadi, selanjutnya disebut sebagai
                        <b>PIHAK PERTAMA</b></p>

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

                    <p style="margin-top: 10px;">Bertindak atas nama pribadi, selanjutnya disebut sebagai
                        <b>PIHAK KEDUA</b>.</p>
                </div>

                <div style="margin-top: 30px;">
                    ${pasalHTML || '<p style="text-align: center;">Tidak ada pasal yang ditambahkan</p>'}
                </div>

                ${kesimpulanTitle || kesimpulanContent ? `
                <div style="margin-top: 30px;">
                    <h3 style="text-align: center; margin-bottom: 15px;">${kesimpulanTitle || 'KESIMPULAN'}</h3>
                    <p style="text-align: justify;">${kesimpulanContent.replace(/\n/g, '<br>') || ''}</p>
                </div>
                ` : ''}

                <div class="signature">
                    <p style="text-align: center;">${tempat || '__________'}, ${penutupTanggal || '__________'}</p>
                    <table class="signature-table">
                        <tr>
                            <td style="text-align: center; width: 50%;">
                                Pihak Pertama,<br><br><br><br>
                                <u>${namaTtdPihak1 || '__________'}</u>
                            </td>
                            <td style="text-align: center; width: 50%;">
                                Pihak Kedua,<br><br><br><br>
                                <u>${namaTtdPihak2 || '__________'}</u>
                            </td>
                        </tr>
                    </table>

                    <div class="witnesses">
                        <h4 style="text-align: center; margin-top: 30px;">SAKSI-SAKSI</h4>
                        <table style="width: 100%; margin-top: 20px;">
                            <tr>
                                <td style="text-align: center; width: 50%;">
                                    Saksi 1:<br><br>
                                    <u>${saksi1 || '__________'}</u>
                                </td>
                                <td style="text-align: center; width: 50%;">
                                    Saksi 2:<br><br>
                                    <u>${saksi2 || '__________'}</u>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </body>

        </html>
    `;

            // Tampilkan preview di iframe
            const previewFrame = document.getElementById('preview');
            previewFrame.contentDocument.open();
            previewFrame.contentDocument.write(html);
            previewFrame.contentDocument.close();
        }

        // Fungsi untuk download PDF
        async function downloadPDF() {
            try {
                const {
                    jsPDF
                } = window.jspdf;

                // Ambil elemen iframe preview
                const iframe = document.getElementById('preview');
                const iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
                const content = iframeDoc.body;

                // Gunakan html2canvas untuk mengkonversi HTML ke canvas
                const canvas = await html2canvas(content, {
                    scale: 2,
                    logging: false,
                    useCORS: true
                });

                // Konversi canvas ke PDF
                const pdf = new jsPDF('p', 'mm', 'a4');
                const imgData = canvas.toDataURL('image/png');
                const imgWidth = 210; // Lebar A4 dalam mm
                const pageHeight = 295; // Tinggi A4 dalam mm
                const imgHeight = canvas.height * imgWidth / canvas.width;
                let heightLeft = imgHeight;
                let position = 0;

                pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;

                // Tambahkan halaman baru jika konten lebih panjang dari satu halaman
                while (heightLeft >= 0) {
                    position = heightLeft - imgHeight;
                    pdf.addPage();
                    pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                    heightLeft -= pageHeight;
                }

                // Simpan PDF
                pdf.save((document.getElementById('judul').value || 'surat_perjanjian') + '.pdf');
            } catch (error) {
                console.error("Error generating PDF:", error);
                alert("Gagal membuat PDF. Silakan coba lagi.");
            }
        }

        // Fungsi untuk download DOCX
        async function downloadDOCX() {
            try {
                const {
                    Document,
                    Paragraph,
                    TextRun,
                    HeadingLevel,
                    Packer
                } = docx;

                // Ambil data dari form
                const judul = document.getElementById('judul').value || "SURAT PERJANJIAN KERJASAMA";
                const tanggal = document.getElementById('tanggal').value || "__________";
                const tempat = document.getElementById('tempat').value || "__________";
                const namaPihak1 = document.getElementById('nama_pihak1').value || "__________";
                const ktpPihak1 = document.getElementById('ktp_pihak1').value || "__________";
                const alamatPihak1 = document.getElementById('alamat_pihak1').value || "__________";
                const namaPihak2 = document.getElementById('nama_pihak2').value || "__________";
                const ktpPihak2 = document.getElementById('ktp_pihak2').value || "__________";
                const alamatPihak2 = document.getElementById('alamat_pihak2').value || "__________";
                const penutupTanggal = document.getElementById('penutup_tanggal').value || "__________";
                const namaTtdPihak1 = document.getElementById('nama_ttd_pihak1').value || "__________";
                const namaTtdPihak2 = document.getElementById('nama_ttd_pihak2').value || "__________";
                const saksi1 = document.getElementById('saksi1').value || "__________";
                const saksi2 = document.getElementById('saksi2').value || "__________";

                // Kumpulkan semua pasal
                const pasalItems = document.querySelectorAll('.pasal-item');
                const pasalElements = [];

                pasalItems.forEach((item, index) => {
                    const title = item.querySelector('.pasal-title').value || `Pasal ${index + 1}`;
                    const content = item.querySelector('.pasal-content').value || '__________';

                    pasalElements.push(
                        new Paragraph({
                            text: `Pasal ${index + 1}`,
                            heading: HeadingLevel.HEADING_3,
                            alignment: "center"
                        }),
                        new Paragraph({
                            text: title,
                            heading: HeadingLevel.HEADING_4,
                            alignment: "center"
                        }),
                        new Paragraph({
                            text: content,
                            spacing: {
                                after: 200
                            }
                        })
                    );
                });

                // Buat dokumen DOCX
                const doc = new Document({
                    sections: [{
                        properties: {},
                        children: [
                            // Judul Dokumen
                            new Paragraph({
                                text: judul,
                                heading: HeadingLevel.HEADING_1,
                                alignment: "center",
                                underline: {}
                            }),

                            // Pembukaan
                            new Paragraph({
                                text: `Pada hari ${tanggal}, bertempat di ${tempat}, telah ditandatangani perjanjian kerjasama antara:`,
                                spacing: {
                                    after: 400
                                }
                            }),

                            // Pihak Pertama
                            new Paragraph({
                                text: "PIHAK PERTAMA",
                                heading: HeadingLevel.HEADING_3
                            }),
                            new Paragraph({
                                children: [
                                    new TextRun({
                                        text: "Nama",
                                        bold: true
                                    }),
                                    new TextRun({
                                        text: `: ${namaPihak1}`
                                    })
                                ]
                            }),
                            new Paragraph({
                                children: [
                                    new TextRun({
                                        text: "No. KTP",
                                        bold: true
                                    }),
                                    new TextRun({
                                        text: `: ${ktpPihak1}`
                                    })
                                ]
                            }),
                            new Paragraph({
                                children: [
                                    new TextRun({
                                        text: "Alamat",
                                        bold: true
                                    }),
                                    new TextRun({
                                        text: `: ${alamatPihak1}`
                                    })
                                ]
                            }),
                            new Paragraph({
                                text: "Bertindak atas nama pribadi, selanjutnya disebut sebagai PIHAK PERTAMA",
                                spacing: {
                                    after: 400
                                }
                            }),

                            // Pihak Kedua
                            new Paragraph({
                                text: "PIHAK KEDUA",
                                heading: HeadingLevel.HEADING_3
                            }),
                            new Paragraph({
                                children: [
                                    new TextRun({
                                        text: "Nama",
                                        bold: true
                                    }),
                                    new TextRun({
                                        text: `: ${namaPihak2}`
                                    })
                                ]
                            }),
                            new Paragraph({
                                children: [
                                    new TextRun({
                                        text: "No. KTP",
                                        bold: true
                                    }),
                                    new TextRun({
                                        text: `: ${ktpPihak2}`
                                    })
                                ]
                            }),
                            new Paragraph({
                                children: [
                                    new TextRun({
                                        text: "Alamat",
                                        bold: true
                                    }),
                                    new TextRun({
                                        text: `: ${alamatPihak2}`
                                    })
                                ]
                            }),
                            new Paragraph({
                                text: "Bertindak atas nama pribadi, selanjutnya disebut sebagai PIHAK KEDUA.",
                                spacing: {
                                    after: 400
                                }
                            }),

                            // Pasal-pasal
                            ...pasalElements,

                            // Penutup
                            new Paragraph({
                                text: `${tempat}, ${penutupTanggal}`,
                                alignment: "center",
                                spacing: {
                                    before: 600,
                                    after: 600
                                }
                            }),

                            // Tanda tangan
                            new Paragraph({
                                children: [
                                    new TextRun({
                                        text: "Pihak Pertama,",
                                        bold: true
                                    }),
                                    new TextRun({
                                        text: "\t\t\t\t\t\t\t\t\tPihak Kedua,"
                                    })
                                ]
                            }),
                            new Paragraph({
                                children: [
                                    new TextRun({
                                        text: namaTtdPihak1,
                                        underline: {}
                                    }),
                                    new TextRun({
                                        text: "\t\t\t\t\t\t\t\t\t"
                                    }),
                                    new TextRun({
                                        text: namaTtdPihak2,
                                        underline: {}
                                    })
                                ],
                                spacing: {
                                    before: 800,
                                    after: 400
                                }
                            }),

                            // Saksi-saksi
                            new Paragraph({
                                text: "SAKSI-SAKSI",
                                heading: HeadingLevel.HEADING_3,
                                alignment: "center",
                                spacing: {
                                    before: 400
                                }
                            }),
                            new Paragraph({
                                children: [
                                    new TextRun({
                                        text: "Saksi 1:",
                                        bold: true
                                    }),
                                    new TextRun({
                                        text: "\t\t\t\t\t\t\t\t\tSaksi 2:"
                                    })
                                ]
                            }),
                            new Paragraph({
                                children: [
                                    new TextRun({
                                        text: saksi1,
                                        underline: {}
                                    }),
                                    new TextRun({
                                        text: "\t\t\t\t\t\t\t\t\t"
                                    }),
                                    new TextRun({
                                        text: saksi2,
                                        underline: {}
                                    })
                                ],
                                spacing: {
                                    before: 400
                                }
                            })
                        ]
                    }]
                });

                // Generate dan download DOCX
                Packer.toBlob(doc).then(blob => {
                    const url = URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = (judul || 'surat_perjanjian') + '.docx';
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                    URL.revokeObjectURL(url);
                });
            } catch (error) {
                console.error("Error generating DOCX:", error);
                alert("Gagal membuat dokumen Word. Silakan coba lagi.");
            }
        }

        // Generate otomatis saat pertama kali load
        window.onload = generatePreview;
    </script>