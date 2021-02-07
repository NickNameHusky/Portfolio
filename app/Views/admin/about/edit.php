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
                    Edit Page
                </div>
                <div class="card-body">
                    <form action="<?= base_url('/AboutController/update'); ?>/<?= $about['id']; ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" value=<?= $about['slug']; ?> name="slug">
                        <input type="hidden" value=<?= $about['foto']; ?> name="sampullama">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" autofocus value="<?= $about['name']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="birthday">Birthday</label>
                            <input type="date" class="form-control" id="birthday" name="birthday" value="<?= $about['birthday']; ?>" required>

                        </div>
                        <div class="form-group">
                            <label for="address">address</label>
                            <input type="textarea" class="form-control" id="address" name="address" value="<?= $about['address']; ?>" required>

                        </div>
                        <div class="form-group">
                            <label for="quote">Quote</label>
                            <input type="text" class="form-control" id="quote" name="quote" value="<?= $about['quote']; ?>" required>

                        </div>
                        <div class="form-group">
                            <label for="about_me">About ME</label>
                            <input type="text" class="form-control" id="about_me" name="about_me" value="<?= $about['about_me']; ?>" required>

                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <div class="col-sm-2">
                                <img src="/img/<?= $about['foto']; ?>" class="img-thumbnail img-preview">
                            </div>

                            <div class="custom-file ">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" value="<?= old('foto'); ?>" onchange="previmg()">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('foto'); ?>
                                </div>
                                <label class="custom-file-label" for="customFile"><?= $about['foto']; ?></label>

                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>