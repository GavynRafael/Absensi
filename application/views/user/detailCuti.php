<div class="container-fluid">
    <?php
    $query = "SELECT * FROM `riwayat_cuti` WHERE `id` = $id";
    $showDetail = $this->db->query($query)->result_array();
    $query_user = "SELECT * FROM `user` WHERE `id` = $id_user";
    $showUser = $this->db->query($query_user)->result_array();
    ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <?php foreach ($showDetail as $detail) : ?>
                        <img src="<?= base_url('assets/img/profile/') . $detail['lampiran']; ?>" class="card-img-top  " alt="...">         
                    <?php endforeach; ?>
                    <div class="card-body text-center">
                        <?php foreach ($showUser as $user) : ?>
                            <h5 class="card-title"><?= ucwords($user['name']) ?></h5>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Informasi Absen</h5>
                        <?php foreach ($showDetail as $detail) : ?>
                            <p class="card-text">tanggal Mulai: <?= $detail['tanggal_mulai'] ?></p>
                            <p class="card-text">tanggal Selesai: <?= $detail['tanggal_selesai'] ?></p>
                            <p class="card-text">Status cuti: <?= $detail['status'] ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>