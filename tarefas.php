<?php
    require_once('classes/tarefa.php');
    if(isset($_POST['descricao']) && isset($_POST['titulo'])){
        $novo = new Tarefa();
        $novo->criar($_POST['titulo'],$_POST['descricao'],$_POST['id'],$_POST['status']);
        if($novo->salvar()){
            echo "<script>alert('tarefa cadastrado com sucesso')</script>";
        }
    }
    if($_GET['edit']==1){
        $infos = unserialize(base64_decode($_GET['task']));
        ?>
        <form action="tarefas.php" method="post">
            <input type="hidden" name='id' value="<?=$infos->getId()?>"/>
            <input type="text" placeholder="titulo" name="titulo" value="<?=$infos->getTitulo()?>"/>
            <input type="textarea" placeholder="descricao" name="descricao" value="<?=$infos->getDescricao()?>"/>
            <select name="status" index=<?=$infos->getStatus()?>>
                <option value=0>Aberto</option>
                <option value=1>Fechado</option>
            </select>
            <input type="submit" name="btn_enviar" value="Enviar"/>
        </form>
    <?php
    }else{
?>
<form action="tarefas.php" method="post">
    <input type="text" placeholder="titulo" name="titulo"/>
    <input type="textarea" placeholder="descricao" name="descricao"/>
    <input type="submit" name="btn_enviar" value="Enviar"/>
</form>
    <?php
    }
        $tarefa = new Tarefa();
        $tarefas = $tarefa->getAllTarefas();
        if(!isset($tarefas  )){
            echo "Sem tarefas cadastradas";
        }  
        else{?>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Descricao</th>
                    <th>Status</th>
                    <th>    </th>
                </tr>
            
        <?php
            foreach ($tarefas as $task){
                $edit=base64_encode(serialize($task));
                echo "<tr>
                        <td>".$task->getId()."</td>
                        <td>".$task->getTitulo()."</td>
                        <td>".$task->getDescricao()."</td>
                        <td>".$task->getStatus()."</td>
                        <td><a href='tarefas.php?edit=1&task={$edit}'>editar </a></td>
                    </tr>";
            }
        }?>
        </table>
