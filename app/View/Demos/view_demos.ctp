<header class="panel-heading">
    <h3 class="panel-title">Simulados para Demonstração</h3>
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
                echo $this->Html->link('Fazer Demostração',
                    array(
                        'action' => 'viewDemo', $demo['Demo']['id'],
                    ), array(
                        'class' => 'btn btn-success'
                    )
                );
            ?>
        </td>
      </tr>
    <?php endforeach; ?>
        </tbody>
    </table>
</div>
