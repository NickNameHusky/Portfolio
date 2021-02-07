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
                    <form action="<?= base_url('/SkillController/update'); ?>/<?= $skill['id_skill']; ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="judul">Name Skill</label>
                            <input type="text" class="form-control" id="namaskill" value="<?= $skill['nameskill']; ?>" name="namaskill" autofocus required">
                        </div>
                        <div class="form-group">
                            <label for="percentage">Percentage</label>
                            <input type="number" class="form-control" id="percentage" value="<?= $skill['percentage']; ?>" name=" percentage" min="1" max="100" required>

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