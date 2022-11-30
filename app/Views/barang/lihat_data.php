<?= $this->extend('template') ?>
<?= $this->section('content') ?>
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            Daftar Ketersediaan Studio <small>(Edit, Tambah & Hapus Studio)</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">  
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <?php echo anchor('barang/post','Tambah Ruangan Studio',array('class'=>'btn btn-danger btn-sm')) ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nomor Ruangan Studio</th>
                                                <th>Nama Studio</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($barang as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td> 
                                                <td><?php echo $r['nama_barang']; ?></td>
                                                <td><?php echo $r['nama_kategori']; ?></td>
                                                <td class="center">
                                                    <a type="button"class="btn btn-warning" href="barang/edit/<?= $r['barang_id'] ?>"><i
                                                        class="fa fa-edit"></i> Edit</a>    
                                                    <a href="barang/delete/<?= $r['barang_id']; ?>" type="button" class="btn btn-danger"><i
                                                        class="fa fa-trash"></i> Hapus</a>
                                                </td>
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->
<?= $this->endSection() ?>


