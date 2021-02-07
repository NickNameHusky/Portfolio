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
                    <form action="<?= base_url('/ExperienceController/update'); ?>/<?= $experience['id_experience']; ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="school">Company</label>
                            <input type="text" class="form-control" id="company" value="<?= $experience['company']; ?>" name="company" autofocus required">
                        </div>
                        <div class="form-group">
                            <label for="major">Position</label>
                            <input type="text" class="form-control" id="position" value="<?= $experience['position']; ?>" name="position" required>
                        </div>
                        <div class="form-group">
                            <label for="year">year</label>
                            <input type="text" class="form-control" id="year" value="<?= $experience['year']; ?>" name="year" required>
                        </div>
                        <div class="form-group">
                            <label for="history">Jobdesk</label>
                            <textarea name="jobdesk" class="texteditor" required><?= $experience['jobdesk']; ?></textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>