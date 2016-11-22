<form method="post">
    
    <label for="nome">Nome:</label><br/>
    <input type="text" name="nome" id="nome" size="60" value="<?=$vendedor->getNome()?>"/> <br/>
    
    <label for="salario">Salário:</label><br/>
    <input type="text" name="salario" id="salario" size="20" value="<?=$vendedor->getSalario()?>"/> <br/>
    
    <label for="comissao">Comissão:</label><br/>
    <input type="text" name="comissao" id="comissao" size="10" value="<?=$vendedor->getComissao()?>"/> <br/> <br/>
    
    <input type="hidden" name="id_vendedor" id="id_vendedor" size="10" value="<?=$vendedor->getIdVendedor()?>"/> <br/> <br/>
    
    <input type="submit" value="Salvar"/>     

</form>

<br/>
<a href="/revenda/">Voltar</a>