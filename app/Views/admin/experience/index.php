<?= $this->extend('admin/layout'); ?>
<?= $this->section('content'); ?>
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Experience</h1>
    <a href="<?= base_url('/experience/create'); ?>" class="btn btn-primary">Tambah data</a>
    <br>
    <br>
    <?php
    if (!empty(session()->getFlashdata('success'))) { ?>

        <div class="alert alert-success">
            <?php echo session()->getFlashdata('success'); ?>
        </div>

    <?php } ?>
    <?php if (!empty(session()->getFlashdata('info'))) { ?>

        <div class="alert alert-warning">
            <?php echo session()->getFlashdata('info'); ?>
        </div>

    <?php } ?>

    <?php if (!empty(session()->getFlashdata('warning'))) { ?>

        <div class="alert alert-danger">
            <?php echo session()->getFlashdata('warning'); ?>
        </div>

    <?php } ?>

    <br>
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-1 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body mb-2">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Company</th>
                            <th>Position</th>
                            <th>Years</th>
                            <th>Jobdesk</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Company</th>
                            <th>Position</th>
                            <th>Years</th>
                            <th>Jobdesk</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($experience as $s) : ?>
                            <tr>
                                <td><?= $s['company']; ?></td>
                                <td><?= $s['position']; ?></td>
                                <td><?= $s['year']; ?></td>
                                <td><?= $s['jobdesk']; ?></td>
                                <td> <a href="<?= base_url(); ?>/experience/edit/<?= $s['id_experience']; ?>" class="btn btn-warning">Edit</a>
                                    <a href="<?= base_url(); ?>/experience/delete/<?= $s['id_experience']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus Experience <?php echo $s['company']; ?> ini?')" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>