<header>
	<div id="header_menu" class="logo">
		<a href="/kcal-control" title="KcalControl">
                	<h1>KcalControl</h1>
                </a>
        <ul>
            <li><a href="page_cadastro_usuario.php" title="#">Cadastre-se</a></li>
            <li><a href="#" title="#" onclick="addalimento('login');">Login</a></li>
        </ul>
    </div>
</header>

<div class="login tb" id="tb2" >
    <div id="janela_add" class="box_input">
        <span id="btn-fechar" onclick="$('.tb').fadeOut()" class="bt_excluir3"></span>
        <h2>Entre</h2>

     <form method="POST" action="autenticacao.php">
        <input method="POST" type="text" placeholder="Email" id="email" name="email"/>    
        <input method="POST" type="password" placeholder="Senha" id="senha" name="senha"</input> 
        <input type="submit" value="Entrar" id="btn_entrar" id="entrar" name="entrar"/> 
        <a id="btn_senha" href="index_teste.php">ESQUECI MINHA SENHA</a>  
    </form>
        <div class="cadastrese">
        	<p>AINDA NÃO TEM CONTA?</p>
        	<a  href="page_cadastro_usuario.php">CADASTRE-SE AGORA</a>  
        </div>       
    </div>
</div>
<div id="td1" class="TB_overlay tb" style="position:fixed;z-index:10000;top:0px;left:0px;height:100%;width:100%" onclick="$('.tb').fadeOut()">  	</div>