<header class="panel-heading">
    <h3 class="panel-title">Categorias</h3>
</header>
<div class="panel-body">

    <table class="table table-striped table-hover ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Arquivo</th>
                <th>Tipo</th>
                <th>Categoria</th>
            </tr>
        </thead>
        <tbody>     
            <?php foreach ($materials as $material): ?>
            <tr>
                
                <td> <?php echo $material['Material']['id'] ?> </td>
                <td> <?php echo $material['Material']['name'] ?> </td>
                <td> <?php echo $material['Material']['filename'] ?> </td>
                <td> <?php echo $material['Filetype']['name'] ?> </td>
                <td> <?php echo $material['Category']['name'] ?> </td>

                <td> 
                    <?php 
                        echo $this->Html->link('Editar',
                            array(
                                'action' => 'edit', $material['Material']['id'],
                            ), array(
                                'class' => 'btn btn-info'
                            )
                        );
                    ?>
                    <?php 
                        echo $this->Html->link('Remover',
                            array(
                                'action' => 'delete', $material['Material']['id'],
                            ), array(
                                'class' => 'btn btn-danger',
                                'confirm' => 'Tem certeza?', 
                                'icon' => 'icon-remove'
                            )
                        );
                    ?>
                </td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php 
        echo $this->Html->link('Novo Material',
            array(
                'action' => 'add',
            ), array(
                'class' => 'btn btn-link'
            )
        );
    ?>
    <?php 
        echo $this->Html->link('Novo Tipo de Material',
            array(
                'controller' => 'Filetypes',
                'action' => 'add'
            ), array(
                'class' => 'btn btn-link'
            )
        );
    ?>
</div>

