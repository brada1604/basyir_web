<?php
function youtube($url)
{
    $link = str_replace('http://www.youtube.com/watch?v=', '', $url);
    $link = str_replace('https://www.youtube.com/watch?v=', '', $link);
    $data = '<object width="300" height="200" data="http://www.youtube.com/v/' . $link . '" type="application/x-shockwave-flash">
    <param name="src" value="http://www.youtube.com/v/' . $link . '" />
    </object>';
    return $data;
}

?>                
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Preview Wawasan Islami</h1>

                    <div class="card shadow mb-4">
                        <div class="card-body">

                            <?php
                                foreach($getWawasanIslami as $row):
                            ?>

                                <center><h1 class="h3 mb-2 text-gray-800"><b><?= $row->judul_wawasan_islami; ?></b></h1></center>

                                <center><img clas="bd-placeholder-img card-img-top" width="500"  src="<?= base_url($row->gambar_wawasan_islami); ?>"></center>

                                <p><?= $row->konten_wawasan_islami; ?></p>

                                <?php if ($row->video_wawasan_islami): ?>
                                    <?= youtube($row->video_wawasan_islami); ?> <br> <a href="<?=$row->video_wawasan_islami?>" target="_blank">kunjungi situs</a>   
                                <?php endif ?>
                                <br>

                            <?php endforeach;?>
                        </div>
                    </div>
                    
                    <a class="btn btn-outline-secondary" href="/wawasan_islami_master">Kembali</a>      

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->