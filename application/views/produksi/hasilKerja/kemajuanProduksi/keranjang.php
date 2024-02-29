<tr class="row-keranjang">
	<td class="kode_komponen">
		<?= $this->input->post('kode_komponen') ?>
		<input type="hidden" name="kode_komponen_hidden[]" value="<?= $this->input->post('kode_komponen') ?>">
	</td>
	<td class="job">
		<?= $this->input->post('job') ?>
		<input type="hidden" name="job_hidden[]" value="<?= $this->input->post('job') ?>">
	</td>	
	<td class="part_name">
		<?= $this->input->post('part_name') ?>
		<input type="hidden" name="part_name_hidden[]" value="<?= $this->input->post('part_name') ?>">
	</td>	
	<td class="jobdesc">
		<?= $this->input->post('jobdesc') ?>
		<input type="hidden" name="jobdesc_hidden[]" value="<?= $this->input->post('jobdesc') ?>">
	</td>
	<td class="nama_mp">
		<?= strtoupper($this->input->post('nama_mp')) ?>
		<input type="hidden" name="nama_mp_hidden[]" value="<?= $this->input->post('nama_mp') ?>">
	</td>
	<td class="jumlah_bagus">
		<?= $this->input->post('jumlah_bagus') ?>
		<input type="hidden" name="jumlah_bagus_hidden[]" value="<?= $this->input->post('jumlah_bagus') ?>">
	</td> 
	<td class="jumlah_rijek">
		<?= $this->input->post('jumlah_rijek') ?>
		<input type="hidden" name="jumlah_rijek_hidden[]" value="<?= $this->input->post('jumlah_rijek') ?>">
	</td>
	<td class="nama_shift">
		<?= $this->input->post('nama_shift') ?>
		<input type="hidden" name="nama_shift_hidden[]" value="<?= $this->input->post('nama_shift') ?>">
	</td>
	<td class="catatan">
		<?= $this->input->post('catatan') ?>
		<input type="hidden" name="catatan_hidden[]" value="<?= $this->input->post('catatan') ?>">
	</td>
	<td class="id_barang">
		<?= strtoupper($this->input->post('id_barang')) ?>
		<input type="hidden" name="id_barang_hidden[]" value="<?= $this->input->post('id_barang') ?>">
	</td> 
	<td class="aksi">
		<button type="button" class="btn btn-danger btn-sm" id="tombol-hapus" data-nama-barang="<?= $this->input->post('nama_barang') ?>"><i class="fa fa-trash"></i></button>
	</td>
</tr>