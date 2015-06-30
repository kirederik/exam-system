<header class="panel-heading">
    <h3 class="panel-title">
      Simulado Demo <?php echo $demo['Demo']['id']; ?> - 
        Categoria: <?php echo $demo['Category']['name']; ?>
    </h3>
</header>
<div class="panel-body"> 
    <div class="row pad-left">
      <table class="table table-striped table-hover col-lg-6">
        <thead>
          <tr>
            <th>ID</th>
            <th>Questão</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($questions as $q) { ?>
            <tr>
              <td><?php echo $q['Question']['id'];?></td>
              <td>
                <?php echo $q['Question']['question_text'];?>
              </td>
            </tr> 
          <?php } ?>
        </tbody>
      </table>
    </div>
    <section class="text-center">
        
    <?php 
        echo $this->Html->link('Editar',
          array(
              'action' => 'edit', $demo['Demo']['id'],
          ), array(
              'class' => 'btn btn-primary'
          )
      );
    ?>
    <?php 
        echo $this->Html->link('Voltar',
            array(
                'action' => 'index'
            ), array(
                'class' => 'btn btn-default'
            )
        );
    ?>
    </section>
</div>

