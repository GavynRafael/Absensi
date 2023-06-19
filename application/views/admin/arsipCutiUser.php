<div class="container-fluid">
    <div class="row">
        <?php
        $user = "SELECT * FROM `user` WHERE `id` = $id_user ";
        $showUser = $this->db->query($user)->result_array();
        ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <?php foreach ($showUser as $su) : ?>
                        <h6 class="m-0 font-weight-bold text-primary text-center">Arsip Absen Siswa <?= $su['name']; ?></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu selesai</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Selesai</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $no = 1;
                                $id_user = $su['id'];
                                $riwayat = "SELECT * FROM `riwayat_cuti` WHERE `id_user` = $id_user ORDER BY `date_created` DESC ";
                                $showRiwayat = $this->db->query($riwayat)->result_array();
                                ?>
                                <?php foreach ($showRiwayat as $sr) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $sr['date_created'] ?></td>
                                        <td><?= $sr['status']; ?></td>
                                        <td>
                                            <form action="<?= base_url('detailCuti'); ?>" method="post">
                                                <input type="hidden" name="id_riwayat" value="<?= $sr['id']; ?>">
                                                <input type="hidden" name="id_user" value="<?= $id_user; ?>">
                                                <button type="submit" class="btn btn-primary">Detail</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>