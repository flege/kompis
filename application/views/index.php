<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?=PATH_ASSETS?>bootstrap.min.css">
        <link rel="stylesheet" href="<?=PATH_ASSETS?>dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?=PATH_ASSETS?>select2.min.css">
        <link rel="stylesheet" href="<?=PATH_ASSETS?>daterangepicker.css">

        <title>Kompis</title>
    </head>
    <body>
        <div class="container">
            <h1>Data User</h1>
            <hr/>
            <form class="form-inline">
                <div class="form-group mb-2">
                    <select name="role[]" class="form-control" id="id_label_multiple" multiple="multiple">
                    <!-- <select name="role" class="form-control" id="inlineFormCustomSelect" multiple> -->
                        <option value="superadmin">Super Admin</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <input type="text" name="tanggal" class="form-control" placeholder="Tanggal Mulai">
                </div>
                <button type="submit" class="btn btn-primary mb-2">FIlter</button>
            </form>
            <hr/>
            <a href="<?=base_url('users/tambah')?>" class="btn btn-primary">Tambah Data</a>
            <hr/>
            <?php
            if ($this->session->flashdata('item')) {
                $message = $this->session->flashdata('item');
            ?>
                <div class="alert alert-<?php echo $message['color'] ?>" role="alert"><?= $message['message'] ?></div>
            <?php } ?>
            <table class="table table-bordered table-hover" id="users">
                <thead>
                    <tr>
                        <th width="1">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Join Date</th>
                        <th width="1"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $key=>$u) : ?>
                    <tr>
                        <td><?=$key+1?></th>
                        <td><?=$u->nama?></td>
                        <td><?=$u->email?></td>
                        <td><?=$u->password?></td>
                        <td><?=$u->role?></td>
                        <td><?=$u->join_date?></td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="<?=base_url("users/edit/$u->id")?>" class="btn btn-success">Edit</a>
                                <a href="<?=base_url("users/delete/$u->id")?>" class="btn btn-danger">Delete</a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="<?=PATH_ASSETS?>jquery-3.2.1.min.js"></script>
        <script src="<?=PATH_ASSETS?>moment.min.js"></script>
        <script src="<?=PATH_ASSETS?>popper.min.js"></script>
        <script src="<?=PATH_ASSETS?>bootstrap.min.js"></script>
        <script src="<?=PATH_ASSETS?>jquery.dataTables.min.js"></script>
        <script src="<?=PATH_ASSETS?>dataTables.bootstrap4.min.js"></script>
        <script src="<?=PATH_ASSETS?>daterangepicker.min.js"></script>
        <script src="<?=PATH_ASSETS?>select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $( "#id_label_multiple" ).select2({
                    placeholder: "Pilih Role"
                });
                $('#users').DataTable();
                $('input[name="tanggal"]').daterangepicker({
                    showDropdowns: true,
                });
            } );
        </script>
    </body>
</html>