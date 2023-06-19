<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Form <?= $tittle; ?></h6>
        </div>
        <div class="card-body">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-6">
                        <?= $this->session->flashdata('pesan'); ?>
                    </div>
                </div>
                <?php echo form_open_multipart('cuti'); ?>
                <input type="hidden" name="id_user" value="<?= $user['id']; ?>">
                <div class="mb-4 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label text-md-end">Nama:</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" name="name" value="<?= $user['name']; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="tanggal_mulai">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
                        <?= form_error('tanggal_mulai', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tanggal_selesai">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai">
                        <?= form_error('tanggal_selesai', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="">Pilih Status</option>
                        <option value="cuti">Cuti</option>
                        <option value="sakit">Sakit</option>
                    </select>
                    <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="alasan">Alasan</label>
                    <textarea class="form-control" id="alasan" rows="3" placeholder="Masukkan alasan" name="alasan"></textarea>
                    <?= form_error('alasan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="lampiran" class="col-sm-3 col-form-label text-md-end">Lampiran / bukti foto</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="lampiran" name="lampiran" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Pilih file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    // Update label saat memilih file
                    var fileInput = document.getElementById('lampiran');
                    fileInput.addEventListener('change', function() {
                        var fileName = this.value.split("\\").pop();
                        var label = document.querySelector('.custom-file-label');
                        label.textContent = fileName;
                    });
                </script>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->