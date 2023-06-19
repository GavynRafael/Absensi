<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Manajemen user</h6>
            <button class="btn btn-info mt-2" data-toggle="modal" data-target="#TambahUserModal">Tambah User</button>
            <?php if ($this->session->flashdata('error')) : ?>
                <div class="alert alert-danger my-2" role="alert">
                    <?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('message')) : ?>
                <div class="alert alert-success my-2" role="alert">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            <?php endif; ?>


        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 30%;">Nama</th>
                            <th style="width: 20%;">Arsip Absensi</th>
                            <th style="width: 20%;">Arsip Cuti</th>
                            <th style="width: 25%;">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Arsip Absensi</th>
                            <th>Arsip Izin</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no = 1;
                        $user = "SELECT * FROM `user` WHERE `role_id` = 2";
                        $showUser = $this->db->query($user)->result_array();
                        ?>
                        <?php foreach ($showUser as $su) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $su['name'] ?></td>
                                <form action="<?= base_url('arsipAdmin'); ?>" method="post">
                                    <input type="hidden" name="idUser" value="<?= $su['id']; ?>">
                                    <td><button class="btn btn-primary justify-content-center">Detail</button></td>
                                </form>
                                <form action="<?= base_url('arsipCutiAdmin'); ?>" method="post">
                                    <input type="hidden" name="idUser" value="<?= $su['id']; ?>">
                                    <td><button class="btn btn-primary">Detail</button></td>
                                </form>
                                <td>
                                <!-- <a class="btn btn-primary" href="<?= base_url('editUser/'.$su['id']); ?>" role="button"><i class="fas fa-edit"></i></a> -->
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteUserModal" data-userid="<?= $su['id']; ?>"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Modal Hapus User -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus User</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Anda yakin ingin menghapus user ini?
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-danger" id="deleteUserButton" href="<?= base_url('admin/deleteUser/'); ?><?= $su['id']; ?>">Hapus</a>
            </div>
        </div>
    </div>
</div>




<!-- modal tambah user -->
<div class="modal fade" id="TambahUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPenggunaModalLabel">Tambah Pengguna</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url(); ?>manajemenSiswa/TambahUser">
                    <div class=" form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">

                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                    </div>
                    <div class="form-group">
                        <label for="roleId">Role ID</label>
                        <select class="form-control" id="roleId" name="roleId">
                            <option value="">Pilih Role</option>
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal edit user -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPenggunaModalLabel">Tambah Pengguna</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url(); ?>manajemenSiswa/TambahUser">
                    <div class=" form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">

                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                    </div>
                    <div class="form-group">
                        <label for="roleId">Role ID</label>
                        <select class="form-control" id="roleId" name="roleId">
                            <option value="">Pilih Role</option>
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // hapus
            $('.btn-danger').click(function() {
                var userId = $(this).data('userid');
                $('#deleteUserButton').attr('href', 'admin/deleteUser/' + userId);
            });

            $('#deleteUserModal').on('hidden.bs.modal', function() {
                $('#deleteUserButton').attr('href', '#');
            });

        });
    </script>
</div>

</div>
<!-- End of Main Content -->