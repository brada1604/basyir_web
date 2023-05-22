<!DOCTYPE html>
<html>
    <head>
        <title><?= $title;?></title>
    </head>
    
    <body>
        <h3> Register </h3>

        <?php if(isset($validation)):?>
            <label style="color: red;"> <?= $validation->listErrors() ?> </label>
        <?php endif;?>

        <form action="/register/save" method="post">       
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" required></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" required></td>
                </tr>
                <tr>
                    <td>Password Konfirmasi</td>
                    <td><input type="password" name="confpassword" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="login" value="Register"></td>
                </tr>
            </table>
        </form>
    </body>
</html>