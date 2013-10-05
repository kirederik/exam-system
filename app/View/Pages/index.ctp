<?php 
    echo $this->Html->link('Disciplinas', array('controller' => 'Disciplines', 'action' => 'index')); 
    echo "<br >";
    echo $this->Html->link('Categorias', array('controller' => 'Categories', 'action' => 'index'));
    echo "<br >";
    echo $this->Html->link('Questões', array('controller' => 'Questions', 'action' => 'index'));
 ?>