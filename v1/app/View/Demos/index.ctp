<header class="panel-heading">
    <h3 class="panel-title">Simulados Demo</h3>
</header>
<div class="panel-body">
    <table class="table table-striped table-hover ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Categoria</th>
                <!-- <th>Disciplinas</th> -->
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>     
          <?php foreach ($demos as $demo): ?>
      <tr>
        <td><?php echo $demo['Demo']['id']; ?></td>
        <td>
          <?php 
            echo $demo['Category']['name'];
          ?>
        </td>
        <td>
            <?php 
                echo $this->Html->link('Ver',
                    array(
                        'action' => 'view', $demo['Demo']['id'],
                    ), array(
                        'class' => 'btn btn-success'
                    )
                );
            ?>

            <?php 
                echo $this->Html->link('Editar',
                    array(
                        'action' => 'edit', $demo['Demo']['id'],
                    ), array(
                        'class' => 'btn btn-info'
                    )
                );
            ?>
            <?php 
                echo $this->Html->link('Remover',
                    array(
                        'action' => 'delete', $demo['Demo']['id'],
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
        echo $this->Html->link('Novo Simulado Demo',
            array(
                'action' => 'add',
            ), array(
                'class' => 'btn btn-link'
            )
        );
    ?>
</div>
