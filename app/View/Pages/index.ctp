<?php 
    echo $this->Html->link('Disciplinas', array('controller' => 'Disciplines', 'action' => 'index')); 
    echo "<br >";
    echo $this->Html->link('Categorias', array('controller' => 'Categories', 'action' => 'index'));
    echo "<br >";
    echo $this->Html->link('Questões', array('controller' => 'Questions', 'action' => 'index'));
  	echo "<br >";
    echo $this->Html->link('Exercícios', array('controller' => 'Exercises', 'action' => 'index'));
    echo "<br >";
    echo $this->Html->link('Provas', array('controller' => 'Exams', 'action' => 'index'));
    echo "<hr />";
    echo $this->Html->link('Ver Simulados', array('controller' => 'Exams', 'action' => 'exams'));
    echo "<br >";
    echo $this->Html->link('Ver Exercícios', array('controller' => 'Exercises', 'action' => 'exams'));
 ?>