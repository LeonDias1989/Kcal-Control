<header>
	<div id="header_menu">
		<h1><a href="#" title="KcalControl">KcalControl</a></h1>
        <ul>
        	<li><a href="#" title="#">Dica</a></li>
            <li><a href="#" title="#">Controle</a></li>
            <li><a href="pesquisa_alimentos.php" title="#">Pesquisa</a></li>
            <li><a href="#" title="#">Ranking</a></li>
            <li><a href="#" title="#" onclick="addalimento('login');">Login</a></li>
        </ul>
    </div>
</header>

<div class="login tb" id="tb2" >
    <div id="janela_add" class="box_input">
        <span id="btn-fechar" onclick="$('.tb').fadeOut()" class="bt_excluir3"></span>
        <h2>Entre</h2>
        <input type="text" placeholder="Login"/>    
        <input type="password" placeholder="Senha"> 
        <input type="button" value="Entrar" id="btn_entrar"/> 
        <a id="btn_senha" href="#">ESQUECI MINHA SENHA</a>  
        <div class="cadastrese">
        	<p>AINDA NÃO TEM CONTA?</p>
        	<a  href="page_cadastro_usuario.php">CADASTRE-SE AGORA</a>  
        </div>       
    </div>
</div>
<div id="td1" class="TB_overlay tb" style="position:fixed;z-index:10000;top:0px;left:0px;height:100%;width:100%" onclick="$('.tb').fadeOut()">  	</div>