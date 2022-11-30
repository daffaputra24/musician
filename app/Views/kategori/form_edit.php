<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<h2 class="page-header">Edit Studio</h2>
<form method="post" action="/kategori/edit">
<input type="hidden" value="<?= $kategory['kategori_id']?>" name="kategori_id">
<table class="table table-bordered">
  <tr><td width="130">Nama Studi</td>
        <td>
        <div>
       <input type="text" name="nama_kategori" placeholder="kategori" class="form-control" value="<?= $kategory['nama_kategori']?>">
        </div>
       </td>
  </tr>
 <tr><td width="130">Harga Sewa Studio</td>
   	<td>
   		<div>
   		<input type="text" name="harga" placeholder="harga" class="form-control" value="<?= $kategory['harga']?>">
		</div>
	</td>
 </tr>

    <tr><td colspan="2"><button type="submit" class="btn btn-primary btn-sm">Simpan</button> 
        <?php echo anchor('kategori','Kembali',array('class'=>'btn btn-primary btn-sm'))?></td></tr>
</table>
</form>
<?= $this->endSection() ?>