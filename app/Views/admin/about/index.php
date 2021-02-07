<?= $this->extend('admin/layout'); ?>
<?= $this->section('content'); ?>
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">About </h1>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="row">
            <div class="col">

                <div class="card" style="width: 20rem;">

                    <img class="card-img-top" src="<?= base_url(); ?>/img/<?= $about['foto']; ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?= $about['name']; ?></h5>
                        <p class="card-text"> <?= $about['about_me']; ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Birthday : <?= $about['birthday']; ?></li>
                        <li class="list-group-item">Address : <?= $about['address']; ?></li>
                        <li class="list-group-item">Quote : <?= $about['quote']; ?></li>
                    </ul>
                    <div class="card-body">
                        <a href="<?= base_url(); ?>/about/edit/<?= $about['slug']; ?>" class="btn btn-warning">EDIT</a>

                    </div>
                </div>



            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->
<?= $this->endSection(); ?>