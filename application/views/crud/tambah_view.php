<?php
if($this->session->flashdata('pesan')) {
    echo $this->session->flashdata('pesan');
}
echo validation_errors();
?>

<div class="widget">
	<div class="title">
		<span> Tambah Data</span>
	</div>
	<div class="chart">
<?= form_open_multipart(base_url('tambah/tambah')); ?>
		<table border="0">
			<tr>
				<td>sadsad</td>
				<td>:</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr>
				<td>Gambar</td>
				<td>:</td>
				<td><input type="file" name="gambar" accept="image/*"></td>
			</tr>
			<tr>
				<td height="50px" colspan="3" align="center"><button value="submit">Simpan</button></td>
			</tr>
		</table>
<?= form_close(); ?>
	</div>
</div>
<div class="widget">
	<div class="title">
		<span>Data</span>
	</div>
	<div class="chart">
		<table width="100%">
			<tr>
				<th>No.</th>
				<th>Nama</th>
				<th>Gambar</th>
				<th colspan="2">Action</th>
			</tr>
			<?php $no= 1;

			foreach($tampil as $list) {
			?>
			<tr align="center">
				<td><?= $no ?></td>
				<td><?= $list['nama_data']; ?></td>
				<td>
					<img width="100px" src=" <?= base_url();?>assets/img/<?php
                    if($list['gambar']==''){
                      echo 'kosong.png';
                      }else{
                      echo $list['gambar'];
                      } ?>">
				</td>
				<td><a href="<?= base_url('tambah/edit/') ?><?= $list['id_data']; ?>">Edit</a></td>
				<td><a href="<?= base_url('tambah/hapus/') ?><?= $list['id_data']; ?>">Hapus</a></td>
			</tr>
			<?php 
			$no++;
			} 
			?>
		</table>
	</div>
</div>