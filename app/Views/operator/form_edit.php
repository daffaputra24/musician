<?= $this->extend('template') ?>
<?= $this->section('content') ?>
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            Musician <small>Edit Data Operator</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <form method="post" action="/operator/edit">
                                <input type="hidden" value="<?= $operator['operator_id']?>" name="operator_id">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama" value="<?= $operator['nama_lengkap']?>">
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" value="<?= $operator['username']?>">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control"  name="password" placeholder="password">
                                </div>

                                <button type="submit" class="btn btn-primary btn-sm">Update</button> | 
                                <?php echo anchor('operator','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->
<?= $this->endSection() ?>