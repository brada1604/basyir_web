<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Tabel Mahasiswa">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <title>TOKO SOUVERNIR SALMAN</title>
    </head>
    <body>
    <table width="100%" height="100%" border="1">
        <tr style="height:50px">
            <td>
                <nav  class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;"> 
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" 
                        id="navbarSupportedContent">
                        <ul class=" nav navbar-nav navbar-center">
                            <li class="nav-item active">
                                <a class="nav-link" href="/home">BERANDA</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="/info">INFORMASI<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/souvernir">BARANG</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">LOGOUT</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </td>
        </tr>
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
            <div class="text-center">
                <a class="navbar-brand" href="">TOKO SOUVERNIR SALMAN</a>
            </div>
        </nav>
        <tr>
            <td colspan="5">
                <center>
                    <?= $this->renderSection('content') ?>
                </center>
            </td>
        </tr>
        <tr>
            <th colspan="5">
                <nav  class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd; text-align:center"> 
                    <h3>TOKO SOUVERNIR SALMAN</h3>
                </nav>
            </th>
        </tr>
    </table>
    </body>
</html>