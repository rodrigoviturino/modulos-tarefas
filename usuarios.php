
    <div class="jumbotron">
        
<?php
    require_once('header.php');
    require_once('classes/usuario.php');
?>    
    <div class="container">
        <h4>
            Usuarios cadastradas
        </h4>
    <?php
        $usuario = new Usuario();
        $usuarios = $usuario->getAllUsuarios();
        if(!isset($usuarios)){
            echo "Sem usuarios cadastradas";
        }  
        else{?>
            <table class='table table-borderless table-hover'>
                <thead class="thead-light">
                    <tr>
                        <th>Email</th>
                        <th>Senha</th>
                        <th>Status</th>
                        <th>Log</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                       
                    </tr>
                </thead>
                <tbody class="table-striped">
        <?php
            foreach ($usuarios as $valor){
                echo "<tr>
                        <td>".$valor['email']."</td>
                        <td>".$valor['senha']."</td>
                        <td>".$valor['status']."</td>
                        <td>".$valor['log']."</td>
                        <td><a href='#'>Editar</a></td>
                        <td><a href='#'>Excluir</a></td>
                    </tr>";
            }
        }?>
                </tbody>
            </table>
    </div>
</div>
<?php require_once('footer.php');