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
                    <form action=<?= base_url('/ExperienceController/save'); ?> method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="school">Company</label>
                            <input type="text" class="form-control" id="company" name="company" autofocus required">
                        </div>
                        <div class="form-group">
                            <label for="major">Position</label>
                            <input type="text" class="form-control" id="position" name="position" required>
                        </div>
                        <div class="form-group">
                            <label for="year">year</label>
                            <input type="text" class="form-control" id="year" name="year" required>
                        </div>
                        <div class="form-group">
                            <label for="history">Jobdesk</label>
                            <textarea name="jobdesk" class="texteditor" required></textarea>
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