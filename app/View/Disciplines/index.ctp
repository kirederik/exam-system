<header class="panel-heading">
    <h3 class="panel-title">Disciplinas</h3>
</header>
<div class="panel-body">

    <table class="table table-striped table-hover ">
        <thead>
            <tr>
                <th>Ordem</th>
                <th>Nome</th>
                <th>Categorias</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>     
            <?php foreach ($disciplines as $discipline): ?>
            <tr>
                
                <td> <?php echo $discipline['Discipline']['ordem'] ?> </td>
                <td> <?php echo $discipline['Discipline']['name'] ?> </td>
                <td> <?php $sep = ", "; $amount = count($discipline['Category']); 
                    foreach ($discipline['Category'] as $key => $value) {
                    if ($key+1 == $amount ) {
                        $sep = "";
                    } elseif ($key+2 == $amount) {
                        $sep = " e ";
                    }
                    echo $value['name'] . $sep . ' ';
                }?> </td>
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
        echo $this->Html->link('Nova Disciplina',
            array(
                'action' => 'add',
            ), array(
                'class' => 'btn btn-link'
            )
        );
    ?>
</div>

