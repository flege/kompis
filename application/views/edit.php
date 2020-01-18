<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?=PATH_ASSETS?>bootstrap.min.css">
        <title>Kompis</title>
    </head>
    <body>
        <div class="container">
            <h1>Update Data</h1>
            <form action="<?=base_url('users/update')?>" method="POST">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" value="<?=$data->nama?>" class="form-control" placeholder="...">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="<?=$data->email?>" class="form-control" placeholder="...">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="newpassword" value="<?=$data->password?>" class="form-control" placeholder="...">
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control" id="inlineFormCustomSelect">
                        <option value="superadmin" <?=($data->role=='superadmin')?'selected':'';?>>Super Admin</option>
                        <option value="admin" <?=($data->role=='admin')?'selected':'';?>>Admin</option>
                        <option value="user" <?=($data->role=='user')?'selected':'';?>>User</option>
                    </select>
                </div>
                <input type="hidden" name="id" value="<?=$data->id?>">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="<?=PATH_ASSETS?>jquery-3.2.1.min.js"></script>
    </body>
</html>