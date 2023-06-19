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
                <?php echo form_open_multipart('user'); ?>
                <input type="hidden" name="id_user" value="<?= $user['id']; ?>">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label text-md-end">Nama:</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" name="name" value="<?= $user['name']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="status" name="status">
                            <option value="hadir">Hadir</option>
                            <option value="pulang">Pulang</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="foto" class="col-sm-2 col-form-label text-md-end">Foto:</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Pilih file</label>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    // Update label saat memilih file
                    var fileInput = document.getElementById('foto');
                    fileInput.addEventListener('change', function() {
                        var fileName = this.value.split("\\").pop();
                        var label = document.querySelector('.custom-file-label');
                        label.textContent = fileName;
                    });
                </script>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </div>
                <?= form_close(); ?>
            </div>

        </div>
    </div>
    <!-- /.container-fluid -->
</div>
</div>
<!-- End of Main Content -->