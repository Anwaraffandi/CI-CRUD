<div class="judul" >
	<span> Halaman Utama </span>
</div>
<div class="widget">
	<div class="title">
		<span> Halaman Utama </span>
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
