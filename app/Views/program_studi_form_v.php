<section class="my-4">
    <div class="container">
        <h1>Program studi</h1>
        <form method="POST" action="<?= site_url('Program_Studi/save')?>">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kode</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kode" name="kode" required maxlength="3" value="<?php if(!empty($dataProdi)) echo $dataProdi->kode_prodi;?>">
                    <!-- Kode_Prodi lama, untuk kebutuhan system admin -->
                    <input type="hidden" value="<?php if(!empty($dataProdi)) echo $dataProdi->kode_prodi?>" id="id" name="id">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Program studi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" required value="<?php if(!empty($dataProdi)) echo $dataProdi->nama_prodi?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Ketua</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="ketua" name="ketua" required value="<?php if(!empty($dataProdi)) echo $dataProdi->ketua_prodi?>">
                </div>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</section>