<?= $this->extend('template') ?>
<?= $this->section('content') ?>
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            Pengguna <small>(Edit, Tambah & Hapus Pengguna)</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <?php echo anchor('operator/post','Tambah Data',array('class'=>'btn btn-danger btn-sm')) ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Lengkap</th>
                                                <th>Username</th>
                                                <th>Login Trakhir</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($operator as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r['nama_lengkap'] ?></td>
                                                <td><?php echo $r['username'] ?></td>
                                                <td><?php echo $r['last_login'] ?></td>
                                                <td class="center">
                                                    <a type="button"class="btn btn-warning" href="operator/edit/<?= $r['operator_id'] ?>"><i
                                                        class="fa fa-edit"></i> Edit</a>    
                                                    <a href="operator/delete/<?= $r['operator_id']; ?>" type="button" class="btn btn-danger"><i
                                                        class="fa fa-trash"></i> Hapus</a>
                                                </td>
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->
<?= $this->endSection() ?>