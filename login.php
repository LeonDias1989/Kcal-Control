<?php
include 'classeBD.php';
	$email = $_POST['email'];
	$entrar = $_POST['entrar'];
    $senha = $_POST['senha'];
    $bd = new funcoesBD();

        if (isset($entrar)) {
                     
            $verifica = mysqli_query($bd->conectar(), "SELECT * FROM usuario WHERE email = '$email' AND senha = 'md5($senha)'") or die("ERRO");
                if (mysqli_num_rows($verifica)<=0){
                    echo"<script language='javascript' type='text/javascript'>alert(email = '$email'); alert(senha = '$senha');window.location.href='login.html';</script>";
                    die();
                }else{
                    setcookie("email",$email);
                    header("Location:index_teste.php");
                }
        }
?>
