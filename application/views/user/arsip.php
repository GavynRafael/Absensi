<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Arsip Absen Siswa <?= $user['name']; ?></h6>
            
            <a class="btn btn-primary btn-sm mt-3" data-toggle="modal" data-target="#Modal" role="button">Laporan Bulanan</a>
            <!-- Modal -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Waktu</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Waktu</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no = 1;
                        $id_user = $user['id'];
                        $riwayat = "SELECT * FROM `riwayat_absen` WHERE `id_user` = $id_user ORDER BY `date_created` DESC ";
                        $showRiwayat = $this->db->query($riwayat)->result_array();
                        ?>
                        <?php foreach ($showRiwayat as $sr) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $sr['date_created'] ?></td>
                                <td><?= $sr['status']; ?></td>
                                <td>
                                    <form action="<?= base_url('detail'); ?>" method="post">
                                    <input type="hidden" name="id_riwayat" value="<?= $sr['id']; ?>">
                                    <input type="hidden" name="id_user" value="<?= $user['id']; ?>">
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
    <div id="Modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Menu Laporan Bulanan</h1>
                </div>
                <form action="<?= base_url('laporan'); ?>" method="post">
                    <input type="hidden" name="id_user" value="<?= $user['id']; ?>">
                    <div class="modal-body">
                        <input id="bulan" name="bulan" type="month">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tampilkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->