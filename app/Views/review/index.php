<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Review</h1>
    <p class="mb-4">Data untuk memanage review. </p>
    <a class="edit" href="/review/add"><button type="button" class="btn btn-primary">Tambah</button></a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Review</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Reviewer</th>
                            <th>Pekerjaan</th>
                            <th>Bintang</th>
                            <th>Pesan</th>
                            <th>status</th>
                            <th>Gambar</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Reviewer</th>
                            <th>Pekerjaan</th>
                            <th>Bintang</th>
                            <th>Pesan</th>
                            <th>status</th>
                            <th>Gambar</th>
                            <th>Opsi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($getReview as $row) :
                        ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $row->reviewer; ?></td>
                                <td><?= $row->pekerjaan; ?></td>
                                <td><?= $row->bintang; ?></td>
                                <td><?= $row->pesan; ?></td>
                                <td>
                                    <?php if ($row->status_review == 1) : ?>
                                        <button type="button" class="btn btn-outline-success">Show</button>

                                        <a class="edit_status" class="btn btn-outline-secondary" href="/review/edit_status/<?= $row->id_review; ?>/0"><button type="button" class="btn btn-outline-secondary">Hide</button></a>


                                    <?php elseif ($row->status_review == 0) : ?>
                                        <button type="button" class="btn btn-outline-danger">Hide</button>
                                        <a class="edit_status" class="btn btn-outline-secondary" href="/review/edit_status/<?= $row->id_review; ?>/1"><button type="button" class="btn btn-outline-secondary">Show</button></a>
                                    <?php endif ?>
                                </td>
                                <td><img clas="bd-placeholder-img card-img-top" width="100" height="100" src="<?= base_url($row->gambar_reviewer); ?>"></td>
                                <td>
                                    <a class="edit" class="btn btn-warning" href="/review/edit/<?= $row->id_review; ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a class="hapus" class="btn btn-danger" href="/review/delete/<?= $row->id_review; ?>"><button type="button" class="btn btn-danger">Hapus</button></a>               
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->