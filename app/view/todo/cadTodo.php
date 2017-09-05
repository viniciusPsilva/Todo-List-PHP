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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>          
        <?php require_once '../view/componentes/header2.php'; ?>
        <div class="container">
            <div class="row" style="margin-top: 40px;">
                

            </div>
        </div>

        <?php require_once '../view/componentes/footer.php'; ?>                                           
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="<?= Controller::url('app/util/js/jquery-3.2.1.min.js') ?>"></script>
        <script type="text/javascript" src="<?= Controller::url('app/util/js/materialize.min.js') ?>"></script>
        <script>
            $(document).ready(function () {
                $(".button-collapse").sideNav();
            });
        </script>

    </body>
</html>
