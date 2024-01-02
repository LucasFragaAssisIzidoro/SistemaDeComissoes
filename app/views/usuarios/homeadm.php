<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <?php echo Sessao::mensagem('usuario'); ?>
    <section class="container">
        <h1>Painel de controle</h1>
        <article class="ection services-ssection">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-lg-4">
                        <a href="<?php echo URL ?>/estoques/index">
                            <div class="feature-box-1">
                                <div class="icon">
                                    <i class="fa fa-archive"></i>
                                </div>
                                <div class="feature-content">
                                    <h5>Gerenciar estoque</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <a href="<?php echo URL ?>/usuarios/gerenciarturmas">
                            <div class="feature-box-1">

                                <div class="icon">
                                    <i class="fa fa-graduation-cap"></i>
                                </div>
                                <div class="feature-content">
                                    <h5>Gerenciar Turmas</h5>
                                </div>

                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <a href="<?php echo URL ?>/usuarios/gerenciarprofs">
                            <div class="feature-box-1">
                                <div class="icon">
                                    <i class="fa fa-id-card-o"></i>
                                </div>
                                <div class="feature-content">
                                    <h5>Gerenciar professores</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <a href="<?= URL ?>/calendarios/calendarioAdm">
                            <div class="feature-box-1">
                                <div class="icon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                <div class="feature-content">
                                    <h5>Calendário</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <a href="<?php echo URL ?>/usuarios/cadastrar">
                            <div class="feature-box-1">
                                <div class="icon">
                                    <i class="fa fa-user-plus"></i>
                                </div>
                                <div class="feature-content">
                                    <h5>Cadastrar Usuários</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <a href="<?= URL ?>/turmas/cadastrarturma">
                            <div class="feature-box-1">
                                <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="feature-content">
                                    <h5>Cadrastar turmas</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
        </article>
    </section>
</body>

</html>