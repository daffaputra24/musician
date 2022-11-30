<?= $this->extend('template') ?>
<?= $this->section('content') ?>
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                         Rekapitulasi <small>(Laporan Transaksi)</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                


                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal Transaksi</th>
                                                <th>Pengguna</th>
                                                <th>Total Transaksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; $total=0; foreach ($transaksi as $r){ ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r['tanggal_transaksi'] ?></td>
                                                <td><?php echo $r['nama_tamu'] ?></td>
                                                <td>Rp. <?php echo number_format($r['harga'], 2) ?></td>
                                            </tr>
                                        <?php $no++; $total=$total+$r['harga']; } ?>
                                            <tr>
                                                <td colspan="3">TOTAL</td>
                                                <td><b>Rp. <?php echo number_format($total, 2);?></b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /. TABLE  -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->
<?= $this->endSection() ?>