<?= $this->extend('template') ?>
<?= $this->section('content') ?>
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            Musician <small>Edit Data Studio</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->
 
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form method="post" action="/barang/edit">
                                <input type="hidden" name="barang_id" value="<?= $barang['barang_id']?>">
                                <div class="form-group">
                                    <label>No. Studio (lantai. )</label>
                                    <input class="form-control" name="nama_barang" value="<?= $barang['nama_barang']?>">
                                </div>
                                <div class="form-group">
                                    <label>Nama Studio</label>
                                    <select name="kategori_id" class="form-control">
                                    <?php foreach ($kategori as $k) {?>
                                            <option value="<?= $k['kategori_id'];?>"> <?= $k['nama_kategori']; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary btn-sm">Update</button> | 
                                <?php echo anchor('barang','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->
<?= $this->endSection() ?>