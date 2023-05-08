<div class="hp-main-layout-content">
    <div class="row mb-32 gy-32">
        <div class="col-12">
            <div class="row justify-content-between gy-32">
                <div class="col hp-flex-none w-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Order Sampah
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
                            <table class="table table-bordered" id="DataTable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Tanggal Pesanan</th>
                                        <th scope="col">Layanan</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($dataContent['transaction'] as $tr) {


                                    ?>
                                        <tr>
                                            <td scope="row"><?= $i ?></td>
                                            <td><?= $tr['waktu_pesanan'] ?></td>
                                            <td><?= number_format($tr['est_berat_rp'] + $tr['jarak_rp']) ?></td>
                                            <td><?= StatusPesanan($tr['status_pesanan']) ?></td>
                                            <td>
                                                <?php if ($tr['status_pesanan'] == 1) {
                                                    echo "<a class='btn btn-primary' href='" . base_url('order/sampah/') . $tr['id_pesanan'] . "'>Konfirmasi Bayar</a>";
                                                }
                                                ?></td>
                                        </tr>
                                    <?php
                                        $i++;
                                    } ?>
                                </tbody>
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
        // console.log(jQuery().jquery)
        // $('#DataTable').DataTable();
    })
</script>