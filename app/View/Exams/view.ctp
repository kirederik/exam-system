<header class="panel-heading">
    <h3 class="panel-title">
    	Simulado <?php echo $exam['Exam']['id']; ?> - 
        Categoria: <?php echo $exam['Category']['name']; ?>
    </h3>
</header>
<div class="panel-body">
    <div class="row">

    	<div class="col-lg-6">
            <p>Tempo: <?php echo $exam['Exam']['time_minutes']; ?> minutos</p>

    		<table class="table table-striped table-hover col-lg-6">
    			<thead>
    				<tr>
    					<th>Disciplina</th>
    					<th>Quantidade</th>
    				</tr>
    			</thead>
    			<tbody>
    				<?php foreach ($disciplines as $discipline) { ?>
    					<tr>
    						<td><?php echo $discipline['disciplines']['name']; ?></td>
    						<td>
    							<?php foreach ($exam['ExamsDiscipline'] as $e) {
	        						if ($e['discipline_id'] == $discipline['disciplines']['id']) {
										echo $e['amount'] | 0;
									}
	        					}?>
	        				</td>
    					</tr>	
    				<?php } ?>
    			</tbody>
    		</table>
    	</div>
    </div>
    <section class="text-center">
        
    <?php 
            echo $this->Html->link('Editar',
                array(
                    'action' => 'edit', $exam['Exam']['id'],
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

