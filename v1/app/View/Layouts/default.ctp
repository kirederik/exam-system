<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Simulados - Portal do Amador</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php
            echo $this->Html->meta('icon');

            echo $this->Html->css('bootstrap');
            echo $this->Html->css('app');
            echo $this->Html->script('jquery.min');
            echo $this->Html->script('bootstrap');
            echo $this->fetch('css');
            echo $this->fetch('script');
        ?>
    </head>
    <body>
        <?php if (AuthComponent::user('role') == 'admin') { ?>
        <nav class="navbar navbar-default" role="navigation">
          <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <a class="navbar-brand" href="http://localhost/exam-system">Home</a> -->
                <?php echo $this->Html->link('Home',
                    array('controller' => '', 'action' => 'index'),
                    array('class' => "navbar-brand")
                ); ?>
            </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li class="<?php if($this->params['controller'] == 'Disciplines') echo "active" ?>">
                        <?php echo $this->Html->link('Disciplinas',
                            array('controller' => 'Disciplines', 'action' => 'index')
                        ); ?>
                    </li>
                    <li class="<?php if($this->params['controller'] == 'Questions') echo "active" ?>">
                        <?php echo $this->Html->link('Questões',
                            array('controller' => 'Questions', 'action' => 'index')
                        ); ?>
                    </li>
                    <li class="<?php if($this->params['controller'] == 'Categories') echo "active" ?>">
                        <?php echo $this->Html->link('Categorias',
                            array('controller' => 'Categories', 'action' => 'index')
                        ); ?>
                    </li>
                    <li class="<?php if($this->params['controller'] == 'Exams' && $this->params['action'] != 'exams') echo "active" ?>">
                        <?php echo $this->Html->link('Provas',
                            array('controller' => 'Exams', 'action' => 'index')
                        ); ?>
                    </li>
                    <li class="<?php if($this->params['controller'] == 'Demos' && ($this->params['action'] != 'viewDemos' || $this->params['action'] != 'viewDemo')) echo "active" ?>">
                        <?php echo $this->Html->link('Demos',
                            array('controller' => 'Demos', 'action' => 'index')
                        ); ?>
                    </li>
                    <li class="dropdown <?php if($this->params['controller'] == 'Users') echo "active" ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Materiais <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <?php echo $this->Html->link('Lista',
                                    array('controller' => 'Materials', 'action' => 'lista')
                                ); ?>
                            </li>
                            <li>
                                <?php echo $this->Html->link('Tipos',
                                    array('controller' => 'Filetypes', 'action' => 'index')
                                ); ?>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown <?php if($this->params['controller'] == 'Users') echo "active" ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuários <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <?php echo $this->Html->link('Lista',
                                    array('controller' => 'Users', 'action' => 'index')
                                ); ?>
                            </li>
                            <li>
                                <?php echo $this->Html->link('Novo',
                                    array('controller' => 'Users', 'action' => 'add')
                                ); ?>
                            </li>
                            <li>
                                <?php echo $this->Html->link('Usuários Expirados',
                                    array('controller' => 'Users', 'action' => 'expired')
                                ); ?>
                            </li>
                            <li>
                                <?php echo $this->Html->link('Usuários Logados',
                                    array('controller' => 'Users', 'action' => 'loggedin')
                                ); ?>
                            </li>

                        </ul>
                    </li>
                    <li class="<?php if($this->params['controller'] == 'Exams' && $this->params['action'] == 'exams') echo "active" ?>">
                        <?php echo $this->Html->link('Ver Simulados',
                            array('controller' => 'Exams', 'action' => 'exams')
                        ); ?>
                    </li>
                    <li class="<?php if($this->params['controller'] == 'Demos' && ($this->params['action'] == 'viewDemos' || $this->params['action'] == 'viewDemo')) echo "active" ?>">
                        <?php echo $this->Html->link('Ver Demos',
                            array('controller' => 'Demos', 'action' => 'viewDemos')
                        ); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link('Logout',
                            array('controller' => 'Users', 'action' => 'logout')
                        ); ?>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
        <?php } ?>

        <div class="mainheader">
            <div class="container container-logo">

            </div>
            <header class="page-header">
                <?php if (!AuthComponent::user('id') && ! ($this->params['controller'] == 'Demos')) { ?>
                    <h1 class="container text-center">
                        <span class="text-center">
                            <?php echo $this->Html->image("timao_small.png", array('alt' => 'Portal do Amador', 'class' => 'logo')); ?>
                        </span>
                <?php } else { ?>
                    <h1 class="container center-on-small">
                        <span class="hide-on-large text-center">
                            <?php echo $this->Html->image("timao_small.png", array('alt' => 'Portal do Amador', 'class' => 'logo')); ?>
                        </span>
                        <span class="hide-on-small">
                            <?php echo $this->Html->image("logo_sem_fundo_small.png", array('alt' => 'Portal do Amador', 'class' => 'logo')); ?> Simulados Online 2.0
                        </span>
                    <?php } ?>
                    <small>
                        <?php if (AuthComponent::user('id')) {
                            echo $this->Html->link('Sair',
                                array('controller' => 'Users', 'action' => 'logout')
                            # , array('class' => 'btn btn-info')
                            );
                        } ?>
                    </small>
                </h1>
            </header>
        </div>

        <article class="main">    
            <div class="container">
                <div class="row">
                    <?php if (strtolower($this->params['controller']) == 'exams' && 
                              $this->params['action'] == 'exams'): ?>
                        <div class="col-md-2">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Navegação</h3>
                                </div>
                                <div class="panel-body">
                                    <ul class="nav nav-pills nav-stacked">
                                        <li role="presentation" class="<?php if($this->params['controller'] == 'Exams' && $this->params['action'] == 'exams') echo "active" ?>">
                                            <?php echo $this->Html->link('Ver Simulados',
                                                array('controller' => 'Exams', 'action' => 'exams')
                                            ); ?>
                                        </li>
                                        <li role="presentation" class="<?php if($this->params['controller'] == 'Materials' && $this->params['action'] == 'index') echo "active" ?>">
                                            <?php echo $this->Html->link('Material Complementar',
                                                array('controller' => 'materials', 'action' => 'index')
                                            ); ?>
                                        </li>
                                        <li role="presentation" class="<?php if($this->params['controller'] == 'Users' && $this->params['action'] == 'profile') echo "active" ?>">
                                            <?php echo $this->Html->link('Perfil',
                                                array('controller' => 'Users', 'action' => 'profile')
                                            ); ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <div class="col-md-10"> <?php else: ?> <div class="col-md-12">
                    <?php 
                        endif; 
                        echo $this->Session->flash();
                        if (!AuthComponent::user('id') && !($this->params['controller'] == 'Demos')) {
                            echo '<section class="panel panel-primary login-page">';
                        } else {
                            echo '<section class="panel panel-primary">';
                        }
                        echo $this->fetch('content'); 
                    ?>
                        </section>
                    </div>
                </div>
            </div>
        </article>

        <footer class="footer">
            Copyright &copy; 2012-<?php echo date("Y"); ?> - <a href="http://www.portaldoamador.com.br">Portal do Amador</a>. Todos os direitos reservados
        </footer>
    </body>
</html>
