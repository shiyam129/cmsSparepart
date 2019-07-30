<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Tabel_barang</h4>
            <form class="form-material m-t-40" method="post" action="<?php echo base_url().$action ?>">
	  <div class="form-group">
                    <label>id_barang</label>
                    <input type="text" name="id_barang" class="form-control" placeholder="" value="<?php echo $dataedit->id_barang?>" readonly>
            </div>
	  <div class="form-group">
            <label>nama_barang</label>
            <input type="text" name="nama_barang" class="form-control" value="<?php echo $dataedit->nama_barang?>">
    </div>
	  <div class="form-group">
            <label>gambar_barang</label>
            <input type="text" name="gambar_barang" class="form-control" value="<?php echo $dataedit->gambar_barang?>">
    </div>
	  <div class="form-group">
            <label>jenis_barang</label>
            <input type="text" name="jenis_barang" class="form-control" value="<?php echo $dataedit->jenis_barang?>">
    </div>
	  <div class="form-group">
            <label>harga_barang</label>
            <input type="text" name="harga_barang" class="form-control" value="<?php echo $dataedit->harga_barang?>">
    </div>
	
                <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
