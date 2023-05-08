<div class="hp-main-layout-content">
    <div class="row mb-32 gy-32">
        <div class="col-12">
            <div class="row justify-content-between gy-32">
                <div class="col hp-flex-none w-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?= base_url() ?>">Home</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Daftar Pesanan
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col pe-md-32 pe-md-120">
                            <h4>History</h4>
                        </div>

                        <div class="col hp-flex-none w-auto">
                            <button type="button" class="btn btn-text btn-icon-only show-code-btn">
                                <i class="ri-code-s-slash-line hp-text-color-black-80 hp-text-color-dark-30 lh-1" style="font-size: 16px;"></i>
                            </button>
                        </div>

                        <div class="col-12 mt-16">
                            <table class="table  table-hover table-striped" id="DataTable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Waktu Pesanan</th>
                                        <th scope="col">Nama Pemesan</th>
                                        <th scope="col">Informasi Lainnya</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var FDataTable = $('#DataTable').DataTable({
            'columnDefs': [],
            deferRender: true,
            "order": [
                [0, "desc"]
            ]
        });
        var swalSaveConfigure = {
            title: "Konfirmasi simpan",
            text: "Yakin akan menyimpan data ini?",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#18a689",
            confirmButtonText: "Ya, Simpan!",
        };

        var swalDeleteConfigure = {
            title: "Konfirmasi hapus",
            text: "Yakin akan menghapus data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, Hapus!",
        };
        Swal.fire({
            title: 'Loading!',
            html: 'Harap tunggu  <b></b> beberapa saat.',
        })
        Swal.showLoading();
        $.when(getAllTransaction()).then((e) => {
            // toolbar.newBtn.prop('disabled', false);
            Swal.close();
        }).fail((e) => {
            console.log(e)
        });

        function getAllTransaction() {
            return $.ajax({
                url: `<?php echo site_url('Admin/getAllTransaction/') ?>`,
                'type': 'POST',
                data: {},
                success: function(data) {
                    var json = JSON.parse(data);
                    if (json['error']) {
                        return;
                    }
                    dataRole = json['data'];
                    renderData(dataRole);
                },
                error: function(e) {}
            });
        }

        function renderData(data) {
            if (data == null || typeof data != "object") {
                console.log("d::UNKNOWN DATA");
                return;
            }
            var i = 0;

            var renderData = [];
            Object.values(data).forEach((d) => {
                var bayarBtn = `
                                 <li>
                                      <a class="dropdown-item" data-id='${d['id_pesanan']}'>Bukti Bayar</a>
                                 </li>
                                `;
                var processBtn = `
                                 <li>
                                      <a class="dropdown-item" data-id='${d['id_pesanan']}'>Terima</a>
                                 </li>
                                 <li>
                                      <a class="dropdown-item" data-id='${d['id_pesanan']}'>Tolak</a>
                                 </li>
                                `;
                var button = `
                                    <div class="col hp-flex-none w-auto">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true">
                                            Action
                                        </button>
                                                <ul class="dropdown-menu" data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(24px, 405px, 0px);">
                                                ${bayarBtn}
                                                ${processBtn}
                                        </ul>
                                    </div>
                                 `;
                var informasi = `
                               Est Berat :${d['est_berat']} Kg<br>
                               Jarak :${d['jarak']}Km<br>
                                `;
                var total = `        ${convertToRupiah(d['est_berat_rp'])}<br>
                                        ${convertToRupiah(d['jarak_rp'])}
                                        <hr>
                                        ${convertToRupiah(parseInt(d['est_berat_rp'])+parseInt(d['jarak_rp']))}

                                `;
                renderData.push([d['id_pesanan'], d['waktu_pesanan'], d['nama_pemesan'], informasi, total, StatusPesanan(d['status']), button]);
            });
            FDataTable.clear().rows.add(renderData).draw('full-hold');
        }

        function StatusPesanan(a) {
            if (a == 1) {
                return "Menunggu Pembayaran";
            } else
            if (a == 2) {
                return "Menunggu Konfirmasi Admin";
            } else if (a == 3) {
                return "Prosess Pengambilan";
            }
        }

    })
</script>