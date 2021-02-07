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
                    Edit Skill
                </div>
                <div class="card-body">
                    <form action="<?= base_url('/EducationController/update'); ?>/<?= $education['id_education']; ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="school">School</label>
                            <input type="text" class="form-control" id="school" value=" <?= $education['school']; ?>" name="school" autofocus required">
                        </div>
                        <div class="form-group">
                            <label for="major">Major</label>
                            <input type="text" class="form-control" value="<?= $education['major']; ?>" id="major" name="major" required>
                        </div>
                        <div class="form-group">
                            <label for="year">year</label>
                            <input type="text" class="form-control" value="<?= $education['year']; ?>" id="year" name="year" required>
                        </div>
                        <div class="form-group">
                            <label for="history">History</label>
                            <textarea name="history" class="texteditor" required><?= $education['history']; ?></textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>