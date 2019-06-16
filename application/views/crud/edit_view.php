<div class="widget">
	<div class="title">
		<span> Tambah Data</span>
	</div>
	<div class="chart">
<?= form_open_multipart(base_url('tambah/edit')); ?>
		<table border="0">
			<input type="hidden" name="id_data" value="<?= $detail['id_data']; ?>">
			<tr>
				<td>sadsad</td>
				<td>:</td>
				<td><input type="text" name="nama" value="<?= $detail['nama_data'];?>"></td>
			</tr>
			<tr>
				<td>Gambar</td>
				<td>:</td>
				<td><input type="file" name="gambar" accept="image/*"></td>
			</tr>
			<tr>
				<td colspan="3" align="center">
					<img width="100px" src=" <?= base_url();?>assets/img/<?php
                    if($detail['gambar']==''){
                      echo 'kosong.png';
                      }else{
                      echo $detail['gambar'];
                      } ?>">
                      <input type="hidden" name="gambarlama" value="<?= $detail['gambar']; ?>">
				</td>
			</tr>
			<tr>
				<td height="50px" colspan="3" align="center">
					<button type="button" onclick=self.history.back()>Batal</button>
					<button value="submit">Simpan</button>
				</td>
			</tr>
		</table>
<?= form_close(); ?>
	</div>
</div>
