<?php require_once 'app/app.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'template/metafile.php' ?>
    <title>Pengaduan</title>
    <?php require_once 'template/metacss.php' ?>
</head>

<body>
	<?php require_once 'template/navbar.php' ?>
    <section class="content-position">
        <div class="container range-content range-login-resgister">
        <div class="row">
            <div class="col-md-8">
                <h1>Form Pengaduan</h1>
                <hr>
                <p>Formulir ini untuk melaporkan keluhan / komplain dari user (pembaca) terhadap konten keptive.com</p>
                <form method="post" action="<?=base_url()?>Pengaduan/sendPengaduan">
                    <input type="hidden" name="_token" value="">

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" required="" value="" placeholder="nama" class="form-control" name="name">
                    </div>

                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" required="" value="" placeholder="Email" class="form-control" name="email">
                    </div>

                    <div class="form-group">
                        <label>No Telp</label>
                        <input type="text" required="" value="" placeholder="No HP" class="form-control" name="mobile">
                    </div>

                    <div class="form-group">
                        <label>Aduan </label>
                        <textarea placeholder="Aduan" required="" name="complain" value="" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Hasil yang diinginkan </label>
                        <textarea placeholder="Hasil yang diinginkan" required="" name="result_complain" value=""
                        class="form-control"></textarea>
                    </div>

                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit"><span class="fas fa-paper-plane"></span> Kirim</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </section>

    <?php require_once 'template/footer.php' ?>

	<?php require_once 'template/metajs.php' ?>

</body>
</html>