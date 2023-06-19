<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                Edit User
            </div>
                <?php
                $user = "SELECT * FROM `user` WHERE `id` = '$id'";
                $showUser = $this->db->query($user)->result_array();
                ?>
            <div class="card-body">
                <?php foreach ($showUser as $su ) :?>
                <form action="<?= base_url('editUser/updateUser'); ?>" method="post">
                <input type="hidden" name="id" value="<?= $su['id']; ?>">
                    <<div class=" form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="name" value="<?= $su['name']; ?>">

                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $su['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password baru/kosongkan">
                    </div>
                    <div class="form-group">
                        <label for="roleId">Role ID</label>
                        <select class="form-control" id="roleId" name="roleId">
                            <option value="">Pilih Role</option>
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->