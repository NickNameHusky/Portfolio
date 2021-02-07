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
                    Edit Experience
                </div>
                <div class="card-body">
                    <form action="<?= base_url('/PortfolioController/update'); ?>/<?= $portfolio['id_portfolio']; ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" value=<?= $portfolio['thumbnail']; ?> name="sampullama">
                        <div class="form-group">
                            <label for="foto">Thumbnail</label>
                            <div class="col-sm-2">
                                <img src="/img/<?= $portfolio['thumbnail']; ?>" class="img-thumbnail img-preview">
                            </div>

                            <div class="custom-file ">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" value="<?= old('foto'); ?>" onchange="previmg()">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('foto'); ?>
                                </div>
                                <label class="custom-file-label" for="customFile"><?= $portfolio['thumbnail']; ?></label>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" class="form-control  <?= ($validation->hasError('link')) ? 'is-invalid' : ''; ?>" value="<?= $portfolio['link']; ?>" id="link" name="link" value="<?= old('link'); ?>">
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