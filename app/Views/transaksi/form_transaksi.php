<?= $this->extend('template') ?>
<?= $this->section('content') ?>
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            Reservasi Studio <small>(Pilih No.Studio & Lama Sewa Studio)</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  --> 

                <div class="row"> 
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('transaksi', array('class'=>'form-horizontal')); ?>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nama Pemesan</label>
                                        <div class="col-sm-10">
                                          <input list="tamu" name="tamu" placeholder="Nama" class="form-control">
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">No. Ketersediaan Studio</label>
                                        <div class="col-sm-10">
                                          <input list="barang" name="barang" placeholder="Nomor Studio" class="form-control">
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Lama Sewa</label>
                                        <div class="col-sm-10">
                                          <input type="text" name="qty" placeholder="Jam" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                          <button type="submit" name="submit" class="btn btn-primary btn-sm">Sewa Studio</button>
                                        </div>
                                    </div>
                                </form>
                                <datalist id="barang">
                                    <?php foreach ($barang as $b) {?>
                                        <option value= <?= $b['nama_barang'];?>> <?php echo $b['nama_kategori']; ?> </option>
                                    <?php } ?>
                                </datalist>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>


                    
                <!-- /. ROW  -->
<?= $this->endSection() ?>