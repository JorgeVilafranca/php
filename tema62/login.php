<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h1>Introduce tus datos</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table>
            <tr>
                <td class="izq"><label>Usuario:</label></td>
                <td class="der"><input type="text" name="user" id="user"></td>
            </tr>
            <tr>
                <td class="izq"><label>Password:</label></td>
                <td class="der"><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="LOGIN"></td>
            </tr>
        </table>
    </form>
</body>
</html>