<div class="container-fluid">
    <div class="row">
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  
                        <h6 class="m-0 font-weight-bold text-primary text-center">Arsip cuti Siswa <?= $user['name']; ?></h6>
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
                                $id_user = $user['id'];
                                $riwayat = "SELECT * FROM `riwayat_cuti` WHERE `id_user` = $id_user ORDER BY `date_created` DESC ";
                                $showRiwayat = $this->db->query($riwayat)->result_array();
                                ?>
                                <?php foreach ($showRiwayat as $sr) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $sr['tanggal_mulai'] ?></td>
                                        <td><?= $sr['tanggal_selesai'] ?></td>
                                        <td><?= $sr['status']; ?></td>
                                        <td>
                                            <form action="<?= base_url('detailCuti'); ?>" method="post">
                                                <input type="hidden" name="id_cuti" value="<?= $sr['id']; ?>">
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
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>