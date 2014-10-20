<?php
    $email_cookie = $_COOKIE['email'];
        if(isset($email_cookie)){
            echo"Bem-Vindo, $email_cookie <br>";
            echo"Essas informações <font color='red'>PODEM</font> ser acessadas por você";
        }else{
            echo"Bem-Vindo, convidado <br>";
            echo"Essas informações <font color='red'>NÃO PODEM</font> ser acessadas por você";
            echo"<br><a href='page_cadastro_usuario'>Faça Login</a> Para ler o conteúdo";
        }
?>


