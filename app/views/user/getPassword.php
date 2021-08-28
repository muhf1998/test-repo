<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card card-outline card-primary mt-3">
            <div class="card-header">
                Lupa Password
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="<?= BASEURL ?>UserController/gantiPassword/<?= $data['user']['id'] ?>" method="post">
                    <div class="form-group small-line-height">
                        <label for="Email">Email</label>
                        <input type="email" name="email" id="email" value="<?= $data['user']['email'] ?>" disabled class="form-control">
                    </div>
                    <div class="form-group small-line-height">
                        <label for="Password Baru">Password Baru</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Ganti Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>