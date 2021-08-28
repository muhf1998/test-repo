<div class="wrapper-full">
    <div class="overlay">
        <div class="container-fluid" style="margin-top: 5% !important">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-12">
                    <div class="card shadow-lg">
                        <div class="card-body" style="padding-bottom: 4rem;">
                            <div class="text-center mt-3" style="margin-bottom: 4rem;">
                                <h3>LOGIN</h3>
                                <?= Flash::flasher() ?>
                            </div>
                            <form action="<?= BASEURL; ?>AuthController/login" method="post">
                                <div class="form-group mt-4">
                                    <div class="row">
                                        <div class="col-3 text-center">
                                            <label for="">Email</label>
                                        </div>
                                        <div class="col-9" style="padding-right: 3rem;">
                                            <input type="email" name="email" id="email" required class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3 text-center">
                                            <label for="">Passsword</label>
                                        </div>
                                        <div class="col-9" style="padding-right: 3rem;">
                                            <input type="password" name="password" id="password" required class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="float-right" style="padding-right: 3rem;">
                                        <button type="submit" class="btn btn-primary">LOGIN</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>