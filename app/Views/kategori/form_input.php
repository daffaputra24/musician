<?= $this->extend('template') ?>
<?= $this->section('content') ?>
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                           Tambah Studio <small>(Nama Studio)</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('kategori/post'); ?>
                                <div class="form-group"> 
                                    <label>Nama Studio</label>
                                    <input type="text" name="kategori" class="form-control" placeholder="Nama">
                                </div>
                                <div class="form-group"> 
                                    <label>Harga Sewa Studio</label>
                                    <input type="text" name="harga" class="form-control" placeholder="Harga">
                                </div>

                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                <?php echo anchor('kategori','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->
<?= $this->endSection() ?>