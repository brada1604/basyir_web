<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo  $title;?></title>
</head>
<body>
    <form action="/mahasiswa/save" method="post">        
        <table>
            <tr>
                <td>nim</td>
                <td><input type="number" name="nim"></td>                 
            </tr>   
            <tr>
                <td>nama</td>
                <td><input type="text" name="nama"></td>                    
            </tr>   
            <tr>
                <td>umur</td>
                <td><input type="number" name="umur"></td>                  
            </tr>   
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>                   
            </tr>               
        </table>
    </form>
</body>
</html>