<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Masukkan Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="query/insertQuery.php" method="post">
            <div class="modal-body">
                <label for="" class="form-text" >Nama Divisi</label>
                <input type="text" name="nama_divisi" id="" class="form-control">
                <label for="" class="form-text" >Deskripsi</label>
                <textarea name="deskripsi" id="" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <input type="submit" value="Submit" name="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
  </div>
</div>