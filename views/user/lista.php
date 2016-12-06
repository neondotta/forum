<ul>

    <?foreach ($lista as $user): ?>
    
        <li>
            <a href="/forum/?r=user/edita&id=<?=$user->getIdUser()?>"><?=$user->getNome()?></a>
            <a href="/forum/?r=user/exclui&id=<?=$user->getIdUser()?>">(Excluir)</a>
        </li>
    
    <? endforeach; ?>
</ul>
<br/>

<a href="/forum/">Voltar</a>