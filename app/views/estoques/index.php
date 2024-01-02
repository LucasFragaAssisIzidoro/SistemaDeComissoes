<html lang="en">

<head>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        .container {
            text-align: center;
        }

        .feature-box-1 {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 150px; /* Altura do box */
            border: 1px solid #ccc; /* Adicionei uma borda para visualização */
            margin-bottom: 20px;
        }

        .feature-box-1 .icon {
            font-size: 60px;
            margin-bottom: 10px;
        }

        .feature-box-1 h5 {
            font-size: 18px;
            margin: 0;
        }
    </style>
<body>
    <?php echo Sessao::mensagem('usuario'); ?>
    <section class="container">
        <h1>Painel de controle</h1>
        <article class="section services-section">
            <div class="container">
                <div class="row">
                <div class="col-sm-9 col-lg-3">
                        <a href="<?php echo URL ?>/estoques/saida">
                            <div class="feature-box-1">
                                <div class="icon">
                                    <i class="fa fa-sign-out"></i>
                                </div>
                                <div class="feature-content">
                                    <h5>Cadastro de Produtos</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-9 col-lg-3">
                        <a href="<?php echo URL ?>/estoques/entrada">
                            <div class="feature-box-1">
                                <div class="icon">
                                    <i class="fa fa-sign-in"></i>
                                </div>
                                <div class="feature-content">
                                    <h5>Entrada de Produtos</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-9 col-lg-3">
                        <a href="<?php echo URL ?>/estoques/ver">
                            <div class="feature-box-1">
                                <div class="icon">
                                    <i class="fa fa-list"></i>
                                </div>
                                <div class="feature-content">
                                    <h5>Ver Produtos</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-9 col-lg-3">
                        <a href="<?php echo URL ?>/estoques/saida">
                            <div class="feature-box-1">
                                <div class="icon">
                                    <i class="fa fa-sign-out"></i>
                                </div>
                                <div class="feature-content">
                                    <h5>Saída de Produtos</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </article>
    </section>
</body>

</html>