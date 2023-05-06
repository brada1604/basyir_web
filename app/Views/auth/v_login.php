<!DOCTYPE html>
<html>
    <head>
        <title><?= $title;?></title>
    </head>
    
    <body>
        <h3> Login </h3>

        <?php if(session()->getFlashdata('msg')):?>
            <label style="color: red;"> <?= session()->getFlashdata('msg') ?> </label>
        <?php endif;?>

        <form action="/login/auth" method="post">       
            <table>
                <tr>
                    <td>NIP</td>
                    <td><input type="text" name="nip" required></td>
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
                    <td></td>
                    <td><input type="submit" name="login" value="Log In"></td>
                </tr>
            </table>
        </form>
    </body>
</html>