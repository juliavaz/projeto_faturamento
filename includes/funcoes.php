<?php

    function redireciona($url){
        ?>
            <script>
                setTimeout("location.href = '<?= $url ?>';",2500);
            </script>
        <?php
    }

    function alert($mensagem){
        ?>
            <script>
                alert('<?php echo $mensagem; ?>')
            </script>
        <?php
    }

    function verifica(){
        if (!isset($_SESSION['id']) && empty($_SESSION['id'])) {
            header("Location: ../cliente/login_clientes.php");
        }
    }
  