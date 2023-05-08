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
        <form id="order_sampah_one_form">
            <div class="col-12">
                <div class="row g-32">
                    <div class="col-12 col-lg-9">
                        <div class="py-18 px-24 rounded border border-black-40 hp-border-color-dark-80 bg-black-0 hp-bg-color-dark-100 mb-32 overflow-scroll hp-scrollbar-x-hidden">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <span class="bg-primary text-white border-primary border rounded-circle me-8 hp-caption lh-normal d-flex align-items-center justify-content-center" style="min-width: 24px; height: 24px;">1</span>
                                    <a href="app-ecommerce-checkout.html">
                                        <span class="text-black-100 hp-text-color-dark-0 text-nowrap">Order Details</span>
                                    </a>
                                </div>
                                <div class="divider flex-grow-1 mx-16"></div>
                                <div class="d-flex align-items-center">
                                    <span class="bg-white hp-bg-dark-30 text-black-60 hp-text-color-dark-100 border-black-60 hp-border-color-dark-30 border rounded-circle me-8 hp-caption lh-normal d-flex align-items-center justify-content-center" style="min-width: 24px; height: 24px;">2</span>
                                    <a href="javascript:;">
                                        <span class="text-black-60 hp-text-color-dark-30 text-nowrap">Metode Pembayaran</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-16 pe-24 hp-ecommerce-app-checkout-title-table">
                            <div class="col w-auto" style="flex: 1 0 0px;">
                                <span class="d-block h5 mb-0 text-black-80 hp-text-color-dark-30">Name</span>
                            </div>

                            <div class="col w-auto" style="flex: 0 0 205px;">
                                <span class="d-block h5 mb-0 text-black-80 hp-text-color-dark-30">Quantity</span>
                            </div>

                            <div class="col hp-flex-none w-auto text-end">
                                <span class="d-block h5 mb-0 text-black-80 hp-text-color-dark-30">Price</span>
                            </div>
                        </div>

                        <div class="row g-32">
                            <div class="col-12">
                                <div class="p-16 py-sm-24 px-sm-32 rounded border border-black-40 hp-border-color-dark-80 bg-black-0 hp-bg-color-dark-100">
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-12 col-md-7">
                                            <div class="row mx-0 mx-sm-n12 align-items-center">
                                                <div class="col hp-ecommerce-app-checkout-text mt-16 mt-sm-0 ps-0 ps-sm-32" style="flex: 1 0 0px;">
                                                    <h4 class="mb-4">Estimasi Berats (Kg)</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-5 mt-24 mt-sm-0 hp-ecommerce-app-checkout-info">
                                            <div class="row mx-0 mx-sm-n12 align-items-center justify-content-sm-end">
                                                <div class="w-auto px-0">
                                                    <div class="input-number">
                                                        <div class="input-number-input-wrap">
                                                            <input class="input-number-input" type="number" id="est_berat" name="est_berat" min="1" max="10" value="1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-auto px-0 text-end ms-64" style="min-width: 100px;">
                                                    <div class="h2 mb-0 text-black-80 hp-text-color-dark-30">
                                                        <span id="est_berat_rp"> 4.000
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="p-16 py-sm-24 px-sm-32 rounded border border-black-40 hp-border-color-dark-80 bg-black-0 hp-bg-color-dark-100">
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-12 col-md-7">
                                            <div class="row mx-0 mx-sm-n12 align-items-center">
                                                <div class="col hp-ecommerce-app-checkout-text mt-16 mt-sm-0 ps-0 ps-sm-32" style="flex: 1 0 0px;">
                                                    <h4 class="mb-4">Jarak (Km)</h4>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-5 mt-24 mt-sm-0 hp-ecommerce-app-checkout-info">
                                            <div class="row mx-0 mx-sm-n12 align-items-center justify-content-sm-end">
                                                <div class="w-auto px-0">
                                                    <div class="input-number">
                                                        <div class="input-number-input-wrap">
                                                            <input class="input-number-input" type="text" readonly id="jarak" name="jarak" value="1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-auto px-0 text-end ms-64" style="min-width: 100px;">
                                                    <div class="h2 mb-0 text-black-80 hp-text-color-dark-30">
                                                        <span id="jarak_rp">
                                                            5.000
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div>
                            <!-- jenis -->
                            <div class="col-12">
                                <div class="p-16 p-sm-24 rounded border border-black-40 hp-border-color-dark-80 bg-black-0 hp-bg-color-dark-100">
                                    <!-- <h3 class="mb-24 text-black-80 hp-text-color-dark-0">
                                        Jenis Sampah</h3> -->
                                    <label for="" class="<?= base_url() ?>-label">
                                        <span class="text-danger me-4">*</span>Jenis Sampah
                                    </label>
                                    <div class="row justify-content-between">
                                        <div class="col-12 mt-16">
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="1" name="organik" id="organik" />
                                                <label class="form-check-label" for="organik">
                                                    Organik
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="1" name="nonorganik" id="nonorganik" />
                                                <label class="form-check-label" for="nonorganik">
                                                    Non Organik
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="1" name="logamberat" id="logamberat" />
                                                <label class="form-check-label" for="logamberat">
                                                    Logam Berat
                                                </label>
                                            </div>
                                            <!-- <div class="form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="" name="kayu" id="kayu" />
                                                <label class="form-check-label" for="kayu">
                                                    Kayu
                                                </label>
                                            </div> -->
                                            <!-- <div class="form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="" name="pecahbelah" id="pecahbelak" />
                                                <label class="form-check-label" for="pecahbelak">
                                                    Pecah Belah
                                                </label>
                                            </div> -->
                                        </div>

                                        <div class="col-12 mt-24 hljs-container">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- addres -->
                            <div class="col-12">
                                <div class="p-16 p-sm-24 rounded border border-black-40 hp-border-color-dark-80 bg-black-0 hp-bg-color-dark-100">
                                    <h3 class="mb-24 text-black-80 hp-text-color-dark-0">Alamat</h3>

                                    <div class="row g-24">
                                        <div class="col-12 col-md-6">
                                            <label for="nama_pemesan" class="form-label">
                                                <span class="text-danger me-4">*</span>Nama Pemesan
                                            </label>
                                            <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" required>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="phone" class="form-label">
                                                <span class="text-danger me-4">*</span>Phone
                                            </label>
                                            <input type="text" class="form-control" id="phone" name="phone" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="alamat" class="form-label">Address</label>
                                            <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- map and foto -->
                            <div class="col-12">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <a class="btn btn-primary" id="scan_btn">
                                                <i class="fa fa-map-marker"></i> Scan
                                            </a>
                                            <!-- <label for="captureimage">
                                                <a class="btn btn-primary">
                                                    <i class="fa fa-camera"></i>Ambil Gambar
                                                </a>
                                            </label> -->
                                            <input id="form_long" name="longitude" type="hidden">
                                            <input id="form_lat" name="latitude" type="hidden">
                                            <input id="lokasi" name="lokasi" type="hidden">
                                            <div id="info"></div>
                                            <div id="log" style="width: 600px; height: 10px;"></div>
                                            <div id="map" style="width: 100%; height: 400px;"></div>
                                        </div>
                                        <!-- <div class="col-sm-12 col-lg-6">
                                            <input type="file" accept="image/*" capture="camera" name="captureimage" id="captureimage" class="btn btn-info" caption style="display:none">
                                            <image id="showimage" preload="none" autoplay="autoplay" src="" width="100%" height="auto"></image>
                                        </div> -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- summary -->
                    <div class="col-12 col-lg-3">
                        <div class="p-24 rounded border border-black-40 hp-border-color-dark-80 bg-black-0 hp-bg-color-dark-100">
                            <h3 class="mb-0 text-black-80 hp-text-color-dark-0">Summary</h3>
                            <div class="row mt-8">
                                <div class="col-12 mt-8">
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-6 hp-input-description text-black-80 hp-text-color-dark-30">Suptotal</div>
                                        <div class="col-6 text-end hp-p1-body fw-medium text-primary" id="sub_total"></div>
                                    </div>
                                </div>
                                <div class="col-12 mt-8">
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-6 hp-input-description text-black-80 hp-text-color-dark-30">Tax</div>
                                        <div class="col-6 text-end hp-p1-body fw-medium text-primary" id="tax">$7.8</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-16">
                                <div class="col-12">
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-6 h5 fw-medium text-primary">Total</div>
                                        <div class="col-6 h5 text-end hp-p1-body fw-medium text-primary" id="total">$67.8</div>
                                    </div>
                                </div>

                                <div class="col-12 mt-16">
                                    <button type="submit" class="btn btn-primary w-100">
                                        Next Step
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.1/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet@1.9.1/dist/leaflet.js" integrity="sha256-NDI0K41gVbWqfkkaHj15IzU7PtMoelkzyKp8TOaFQ3s=" crossorigin=""></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>


<script>
    inarea = false;
    var info = document.getElementById("info");
    var form_long = $('#form_long')
    var form_long = $('#form_long')
    var form_lat = $('#form_lat')
    var scan_btn = $('#scan_btn')
    var jarak = $('#jarak')
    var jarak_rp = $('#jarak_rp')
    var waktu_absen = $('#waktu_absen')
    var lokasi = $('#lokasi')
    dataComp = <?= json_encode(CompInfo()) ?>;
    var st_marker = false;
    var circle = [];

    {
        // function readURL(input) {

        //     if (input.files && input.files[0]) {
        //         var reader = new FileReader();
        //         reader.onload = function(e) {
        //             $('#showimage').attr('src', e.target.result);
        //         }
        //         reader.readAsDataURL(input.files[0]);
        //     }
        // }

        // $("#captureimage").change(function() {
        //     readURL(this);
        // });


        let compLoc = L.latLng(dataComp['latitude'], dataComp['longitude'])
        var map = L.map('map').setView(compLoc, 14);
        var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 27,
        }).addTo(map);

        L.marker(compLoc).addTo(map)
            .bindPopup('Kantor')
            .openPopup();

        scan_btn.on('click', function() {
            getLocation();
        });

        function resetLocation(lat, long) {
            i = 1;
            var cur_loc = 0;
            lokasi.val('0')
        }

        function calcCrow(lat1, lon1, lat2, lon2) {
            var R = 6371000; // km
            var dLat = toRad(lat2 - lat1);
            var dLon = toRad(lon2 - lon1);
            var lat1 = toRad(lat1);
            var lat2 = toRad(lat2);

            var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.sin(dLon / 2) * Math.sin(dLon / 2) * Math.cos(lat1) * Math.cos(lat2);
            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            var d = R * c;
            console.log('jarak = ' + d);
            return d;
        }

        function toRad(Value) {
            return Value * Math.PI / 180;
        }


        function getLocation() {
            if (navigator.geolocation) {
                // info.innerHTML = "Geolocation is suport.";
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                info.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    info.innerHTML = "User denied the request for Geolocation."
                    break;
                case error.POSITION_UNAVAILABLE:
                    info.innerHTML = "Location information is unavailable."
                    break;
                case error.TIMEOUT:
                    info.innerHTML = "The request to get user location timed out."
                    break;
                case error.UNKNOWN_ERROR:
                    info.innerHTML = "An unknown error occurred."
                    break;
            }
        }

        function showPosition(position) {
            resetLocation(position.coords.latitude, position.coords.longitude)
            if (st_marker) {
                map.removeLayer(marker)
            }
            // let cusLoc = L.latLng()
            form_lat.val(position.coords.latitude);
            form_long.val(position.coords.longitude);
            st_marker = true;
            map.flyTo([position.coords.latitude, position.coords.longitude], 12)
            marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);

            let routeUs = L.Routing.osrmv1();
            let customerLoc = L.latLng(position.coords.latitude, position.coords.longitude)
            console.log(compLoc);
            console.log(customerLoc);
            let wp1 = new L.Routing.Waypoint(compLoc);
            let wp2 = new L.Routing.Waypoint(customerLoc);

            routeUs.route([wp1, wp2], (err, routes) => {
                if (!err) {
                    let best = 1000000000000000000000000000000;
                    let bestRoute = 0;
                    for (i in routes) {
                        if (routes[i].summary.totalDistance < best) {
                            bestRoute = i;
                        }
                    }

                    val_jarak = (routes[bestRoute].summary.totalDistance / 1000).toFixed(1);
                    jarak.val(String(val_jarak));
                    jarak_rp.html(convertToRupiah(Math.ceil(val_jarak) * 5000));
                    console.log('best ', routes[bestRoute])
                    console.log('km ', (routes[bestRoute].summary.totalDistance / 1000).toFixed(1))
                    L.Routing.line(routes[bestRoute], {
                        style: [{
                            color: 'green',
                            weight: '10',
                        }]
                    }).addTo(map)

                    inarea = true;

                }
            })
        }
    }

    $(document).ready(function() {
        var form = $('#order_sampah_one_form');
        var berat = $('#est_berat');
        var berat_rp = $('#est_berat_rp');
        // fieldImage = $('#captureimage');
        console.log(dataComp);
        form.submit(function(event) {
            event.preventDefault();

            // console.log('ssts ssubmit :' + $('#captureimage').val());
            console.log('ssts ssubmit :' + inarea);
            if (!inarea) {
                Swal.fire("Ups..", 'anda belum melakukan scan lokasi!', "error");
                return;
            }
            // if (fieldImage.val() == '') {
            //     Swal.fire("Ups..", 'Maaf, anda haruskan melampirkan foto!', "error");
            //     return;
            // }
            // event.preventDefault();
            var url = "<?= base_url('customer/process_one_sampah') ?>";
            Swal.fire({
                title: "Apakah anda Yakin?",
                text: "Data Disimpan!",
                icon: "warning",
                allowOutsideClick: false,
                showCancelButton: true,
                buttons: {
                    cancel: 'Batal !!',
                    catch: {
                        text: "Ya, Saya Simpan !!",
                        value: true,
                    },
                },
            }).then((result) => {
                if (!result.isConfirmed) {
                    return;
                }
                swalLoading();
                $.ajax({
                    url: url,
                    'type': 'POST',
                    data: new FormData(form[0]),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        // buttonIdle(button);
                        var json = JSON.parse(data);
                        if (json['error']) {
                            Swal.fire("Simpan Gagal", json['message'], "error");
                            return;
                        }
                        // var user = json['data']
                        // dataUser[user['id']] = user;
                        Swal.fire("Simpan Berhasil", "", "success").then((result) => {
                            location.href = "<?= base_url('order/sampah/') ?>" + json['data']['id'];
                        })

                    },
                    error: function(e) {}
                });
            });
        });


        berat.on('change keyup', function(ev) {
            berat_rp.html(convertToRupiah(berat.val() * 4000))
        })
    });
</script>