<header class="panel-heading">
    <h3 class="panel-title">Disciplinas</h3>
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
            <?php foreach ($disciplines as $discipline): ?>
            <tr>
                
                <td> <?php echo $discipline['Discipline']['id'] ?> </td>
                <td> <?php echo $discipline['Discipline']['name'] ?> </td>
                <td> 
                    <?php 
                        echo $this->Html->link('Editar',
                            array(
                                'action' => 'edit', $discipline['Discipline']['id'],
                            ), array(
                                'class' => 'btn btn-info'
                            )
                        );
                    ?>
                    <?php 
                        echo $this->Html->link('Remover',
                            array(
                                'action' => 'delete', $discipline['Discipline']['id'],
                            ), array(
                                'class' => 'btn btn-danger'
                            )
                        );
                    ?>
                </td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php 
        echo $this->Html->link('Nova Disciplina',
            array(
                'action' => 'add',
            ), array(
                'class' => 'btn btn-link'
            )
        );
    ?>
</div>

