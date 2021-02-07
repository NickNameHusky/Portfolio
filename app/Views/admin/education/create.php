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
                    Create Skill
                </div>
                <div class="card-body">
                    <form action=<?= base_url('/EducationController/save'); ?> method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="school">School</label>
                            <input type="text" class="form-control" id="school" name="school" autofocus required">
                        </div>
                        <div class="form-group">
                            <label for="major">Major</label>
                            <input type="text" class="form-control" id="major" name="major" required>
                        </div>
                        <div class="form-group">
                            <label for="year">year</label>
                            <input type="text" class="form-control" id="year" name="year" required>
                        </div>
                        <div class="form-group">
                            <label for="history">History</label>
                            <textarea name="history" class="texteditor" required></textarea>
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