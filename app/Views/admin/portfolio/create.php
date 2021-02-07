<?php

use CodeIgniter\Filters\CSRF;
?>
<?= $this->extend('admin/layout'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="card mb-4">
                <div class="card-header">
                    Create Experience
                </div>
                <div class="card-body">
                    <form action=<?= base_url('/PortfolioController/save'); ?> method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="foto">Thumbnail</label>
                            <div class="col-sm-2">
                                <img src="/img/default.jpg" class="img-thumbnail img-preview">
                            </div>

                            <div class="custom-file ">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" value="<?= old('foto'); ?>" onchange="previmg()">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('foto'); ?>
                                </div>
                                <label class="custom-file-label" for="customFile">Pilih gambar ...</label>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" class="form-control  <?= ($validation->hasError('link')) ? 'is-invalid' : ''; ?>" id="link" name="link" value="<?= old('link'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('link'); ?>
                            </div>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>