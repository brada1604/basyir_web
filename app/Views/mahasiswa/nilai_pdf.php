<!DOCTYPE html>  
<html lang="en">  

<head>  
    <meta charset="UTF-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>POLBAN - Nilai Mahasiswa</title>  

</head>  

<body>  
    <img src="<?= $imageSrc ?>" style="width:100px;">
    <h2>Data Nilai Mahasiswa </h2>   
    <table border=1 width=80% cellpadding=2 cellspacing=0 style="margin-top: 5px; text-align:center">  
        <thead>    
            <tr bgcolor=silver align=center>  
                <td>id</td>    
                <td>nim</td>    
                <td>nama</td>    
                <td>uts</td>    
                <td>uas</td>    
                <td>final</td>    
            </tr>    
        </thead>    
        <tbody>    
            <?php foreach ($nilai as $item) : ?>
                <tr align="center">
                    <td><?= $item['id'];?></td>
                    <td><?= $item['nim'];?></td>
                    <td><?= $item['nama'];?></td>
                    <td><?= $item['uts'];?></td>
                    <td><?= $item['uas'];?></td>
                    <td><?= $item['final'];?></td>
                </tr>
            <?php endforeach;?>      
        </tbody>
    </table>   
</body>  

</html>