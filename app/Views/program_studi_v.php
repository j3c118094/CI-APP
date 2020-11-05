<?php

use App\Controllers\Program_Studi;
?>
<div class="my-4">
    <div class="container">
            <h1>Program studi</h1>
            <?php if(!empty($session)):?>
                <div class="alert alert-<?= $session['status'] ? 'success' : 'danger'?> alert-dismissible fade show" role="alert">
                    <?= $session['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif?>
            <p>
                <a href="<?=site_url('Program_Studi/add')?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah data</a>
            </p>
            <table class="table table-striped table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Aksi</th>
                        <th>Kode</th>
                        <th>Program studi</th>
                        <th>Ketua</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($dataProdi as $row):?>
                    <tr>
                        <th>
                            <a href="<?= site_url('Program_Studi/edit/'.$row->kode_prodi); ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Ubah</a>
                            <a href="<?= site_url('Program_Studi/delete/'.$row->kode_prodi); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin data akan dihapus?')"><i class="fa fa-trash"></i> Hapus</a>
                        </th>
                        <td><?= $row->kode_prodi ?></td>
                        <td><?= $row->nama_prodi ?></td>
                        <td><?= $row->ketua_prodi ?></td>
                    </tr>
                <?php endforeach;
                if(empty($dataProdi)) {
                    ?>
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data</td>
                    </tr>
                <?php }
                ?>
                </tbody>
            </table>
    </div>
</div>