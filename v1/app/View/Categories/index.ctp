<header class="panel-heading">
    <h3 class="panel-title">Categorias</h3>
</header>
<div class="panel-body">

    <table class="table table-striped table-hover ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>     
            <?php foreach ($categories as $category): ?>
            <tr>
                
                <td> <?php echo $category['Category']['id'] ?> </td>
                <td> <?php echo $category['Category']['name'] ?> </td>
                <td> 
                    <?php 
                        echo $this->Html->link('Editar',
                            array(
                                'action' => 'edit', $category['Category']['id'],
                            ), array(
                                'class' => 'btn btn-info'
                            )
                        );
                    ?>
                    <?php 
                        echo $this->Html->link('Remover',
                            array(
                                'action' => 'delete', $category['Category']['id'],
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
        echo $this->Html->link('Nova Categoria',
            array(
                'action' => 'add',
            ), array(
                'class' => 'btn btn-link'
            )
        );
    ?>
</div>

