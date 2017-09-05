<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Todo List</title>

        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="<?= Controller::url('app/util/css/materialize.min.css') ?>"  media="screen,projection"/>               
        <link type="text/css" rel="stylesheet" href="<?= Controller::url('app/util/css/meuCss.css') ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>          
        <?php require_once '../view/componentes/header2.php'; ?>

        <div class="container">
            <div class="row" style="margin-top: 50px;">
                
                
                <form class="col s6" method="POST"action="<?= Controller::url('usuario/login')?>">
                 <?php if(isset($erro)){?> <span class="erro-Alert fadeIn"><?=$erro?> </span> <?php };?>  
                
                    <div class="row">
                        <div class="input-field col s12 ">
                            <i class="material-icons prefix">contact_mail</i>
                            <input id="email" name="email" type="email" class="validate">
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">lock outline</i>
                            <input id="senha" name="senha" type="password" class="validate">
                            <label for="senha">senha</label>
                        </div>
                        <button class="btn waves-effect waves-light amber lighten-1 right" type="submit" name="action">Login
                            <i class="material-icons right">send</i>
                        </button>

                    </div>
                </form>

                <div class="col s6">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="<?= Controller::url('app/util/img/login.jpg') ?>">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">Faça o seu login<i class="material-icons right">more_vert</i></span>
                            <p><a href="#"><span class="amber-text lighten-1">ver mais</span></a></p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">Faça o seu login<i class="material-icons right">close</i></span>
                            <p>Faça seu login para aproveitar o melhor do seu gerênciador de atividades</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <?php require_once '../view/componentes/footer.php'; ?>                                           
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="<?= Controller::url('app/util/js/jquery-3.2.1.min.js') ?>"></script>
        <script type="text/javascript" src="<?= Controller::url('app/util/js/materialize.min.js') ?>"></script>    
    </body>
</html>

