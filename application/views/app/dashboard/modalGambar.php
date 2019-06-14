<!-- Modal Add Gambar -->
<div class="modal fade" id="modalAddGambar" tabindex="-1" role="dialog" aria-labelledby="modalMasukTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
            <form action="<?=base_url()?>Dashboard/TambahGambarBerita" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Gambar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_article">ID# Berita</label>
                        <input type="text" name="id_article" id="id_article" class="form-control" style="width: 240px;">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" name="berkas" id="exampleInputFile" class="form-control">
                        <p class="help-block">Max 2MB.</p>
                    </div>
                    <div class="form-group">
                        <label for="id_article">Deskripsi Gambar Berita</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Tambah</button>
                </div>
            </form>
		</div>
	</div>
</div>
<!-- End of Modal Add Gambar -->

<!-- Modal Edit Gambar -->
<div class="modal fade" id="modalEditGambar" tabindex="-1" role="dialog" aria-labelledby="modalMasukTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
            <form action="<?=base_url()?>user/masuk" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Gambar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <?php foreach ($edit_gambar as $key => $value) { ?>
                    <div class="form-group">
                        <label for="id_article">ID# Berita</label>
                        <input type="text" name="id_article" id="id_article" class="form-control" style="width: 240px;" value="<?php $value->id_article ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" name="berkas" id="exampleInputFile" class="form-control">
                        <p class="help-block">Max 2MB.</p>
                    </div>
                    <div class="form-group">
                        <label for="id_article">Deskripsi Gambar Berita</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                <?php } ?>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Edit</button>
                </div>
            </form>
		</div>
	</div>
</div>
<!-- End of Modal Edit Gambar -->

<!-- Modal Add User -->
<div class="modal fade" id="modalAddUser" tabindex="-1" role="dialog" aria-labelledby="modalMasukTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
            <form action="<?=base_url()?>user/daftar" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="username">Nama</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="username">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="username">Jenis Kelamin</label>
                        <ul class="list-unstyled" style="display: flex; align-items: center;">
                            <li style="display: flex; align-items: center;">
                                <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="laki-laki" checked><p style="margin: 0 8px;">Laki-laki</p>
                            </li>
                            <li style="display: flex; align-items: center;">
                                <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="perempuan"><p style="margin: 0 8px;">Perempuan</p>
                            </li>
                        </ul>
                    </div>

                    <div class="form-group">
                        <label for="username">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="username">Konfirm Password</label>
                        <input type="password" name="conf_password" id="conf_password" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="is_admin" value="1"> Admin
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Tambah</button>
                </div>
            </form>
		</div>
	</div>
</div>
<!-- End of Modal Add User -->

<!-- Modal Add User -->
<div class="modal fade" id="modalAddKategori" tabindex="-1" role="dialog" aria-labelledby="modalMasukTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
            <form action="<?=base_url()?>dashboard/addActionKategori" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">Nama Kategori</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="username">Slug Kategori</label>
                        <input type="text" name="slug" id="slug" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Tambah</button>
                </div>
            </form>
		</div>
	</div>
</div>
<!-- End of Modal Add User -->

<!-- Modal Add User -->
<div class="modal fade" id="modalAddSetting" tabindex="-1" role="dialog" aria-labelledby="modalMasukTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
            <form action="<?=base_url()?>dashboard/addActionSetting" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Setting</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">Key Setting</label>
                        <input type="text" name="key" id="key" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="username">Value Setting</label>
                        <input type="text" name="value" id="value" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Tambah</button>
                </div>
            </form>
		</div>
	</div>
</div>
<!-- End of Modal Add User -->