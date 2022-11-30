<?= $this->extend('template') ?>
<?= $this->section('content') ?>
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            Master Studio<small> (Edit, Tambah & Hapus Master)</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->
 
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <?php echo anchor('kategori/post','Tambah Studio',array('class'=>'btn btn-danger btn-sm')) ?> 
                            </div> 
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Studio</th>
                                                <th>Harga Per Jam</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($kategori as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r['nama_kategori'] ?></td>
                                                <td>Rp. <?php echo number_format ($r['harga'],2) ?></td>
                                                <td class="center">
                                                    <a type="button"class="btn btn-warning" href="kategori/edit/<?= $r['kategori_id'] ?>"><i
                                                        class="fa fa-edit"></i> Edit</a>    
                                                    <a href="kategori/delete/<?= $r['kategori_id']; ?>" type="button" class="btn btn-danger"><i
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
