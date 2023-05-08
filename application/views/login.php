<div class="col-12 col-lg-6 py-sm-64 py-lg-0">
    <div class="row align-items-center justify-content-center h-100 mx-4 mx-sm-n32">
        <div class="col-12 col-md-9 col-xl-7 col-xxxl-5 px-8 px-sm-0 pt-24 pb-48">
            <h1 class="mb-0 mb-sm-24">Login</h1>
            <p class="mt-sm-8 mt-sm-0 text-black-60">
                Welcome back, please login to your account.
            </p>

            <form class="mt-16 mt-sm-32 mb-8" id="loginForm">
                <div class="mb-16">
                    <label for="loginUsername" class="form-label">Username :</label>
                    <input type="text" class="form-control" id="username" name="username" />
                </div>
                <div class="mb-16">
                    <label for="loginPassword" class="form-label">Password :</label>
                    <input type="password" class="form-control" id="password" name="password" />
                </div>

                <div class="row align-items-center justify-content-between mb-16">
                    <div class="col hp-flex-none w-auto">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                            <label class="form-check-label ps-4" for="exampleCheck1">Remember me</label>
                        </div>
                    </div>

                    <div class="col hp-flex-none w-auto">
                        <a class="hp-button text-black-80 hp-text-color-dark-40" href="auth-recover.html">Forgot Password?</a>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    <a class="d-block w-100" style="color: inherit">Sign in</a>
                </button>

            </form>

            <div class="col-12 hp-form-info text-center">
                <span class="text-black-80 hp-text-color-dark-40 hp-caption me-4">Don’t you have an account?</span>
                <a class="text-primary-1 hp-text-color-dark-primary-2 hp-caption" href="<?= base_url('register') ?>">Create an account</a>
            </div>

            <div class="mt-48 mt-sm-96 col-12">
                <p class="hp-p1-body text-center hp-text-color-black-60 mb-8">
                    Copyright 2021 Hypeople LTD.
                </p>

                <div class="row align-items-center justify-content-center mx-n8">
                    <div class="w-auto hp-flex-none px-8 col">
                        <a href="javascript:;" class="hp-text-color-black-80 hp-text-color-dark-40">
                            Privacy Policy
                        </a>
                    </div>

                    <div class="w-auto hp-flex-none px-8 col">
                        <a href="javascript:;" class="hp-text-color-black-80 hp-text-color-dark-40">
                            Term of use
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        cur_sh = 'hide';
        $('.show-hide').on('click', function() {
            if (cur_sh == 'hide') {
                console.log('go show')
                cur_sh = 'show';
                $('#password').prop('type', 'text')
            } else {
                // console.log('go show')
                cur_sh = 'hide';
                $('#password').prop('type', 'password')
            }
        })
        var loginForm = $('#loginForm');


        loginForm.on('submit', (ev) => {
            ev.preventDefault();
            Swal.fire({
                title: 'Please Wait !',
                html: 'Loggin ..', // add html attribute if you want or remove
                allowOutsideClick: false,
            });
            Swal.showLoading()
            $.ajax({
                url: "<?= site_url() . 'login-process' ?>",
                type: "POST",
                data: loginForm.serialize(),
                success: (data) => {
                    // buttonIdle(submitBtn);
                    json = JSON.parse(data);
                    if (json['error']) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Login Gagal',
                            text: json['message'],
                        })
                        // swal("Login Gagal", json['message'], "error");
                        return;
                    }
                    $(location).attr('href', '<?= base_url() ?>' + json['data']['nama_controller']);
                },
                error: () => {
                    // buttonIdle(submitBtn);
                }
            });
        });
    });
</script>