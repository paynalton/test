<!DOCTYPE html>
<html lang="es-Mx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="XML Test">
    <meta name="author" content="Oscar Escobar Dominguez">
    <meta name="keyword" content="test">
    <link rel="shortcut icon" href="<?php echo base_url('sources/images/xml-logo.png'); ?>">
    <title>XML Admón.</title>
    <link href="<?php echo base_url('node_modules/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('node_modules/simple-line-icons/css/simple-line-icons.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('node_modules/input-file/input-file.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('node_modules/css/style.css'); ?>" rel="stylesheet">
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
    <!-- Navbar -->
    <header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">☰</button>
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler sidebar-minimizer d-md-down-none" type="button">☰</button>
        <ul class="nav navbar-nav d-md-down-none">
            <li class="nav-item px-3">
                <a class="nav-link" href="#"></a>
            </li>
        </ul>
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item dropdown" style="margin-right:15px !important;">
                <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="d-md-down-none">Usuario: <strong>Prueba</strong></span>
                </a>
            </li>
        </ul>
    </header>
    <div class="app-body">
        <!-- Sidebar -->
        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-title">MENU PRINCIPAL</li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('dashboard/');?>"><i class="fa fa-file"></i>Registro XML</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('record/');?>"><i class="fa fa-list"></i>Historial XMLs</span></a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- Main -->
        <main class="main">
            <div class="container-fluid" style="margin-top:25px;">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    Registro XML
                                </div>
                                <div class="card-body">
                                    <form id="form_xml" class="form-horizontal" enctype="multipart/form-data">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="name">Descripcion</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Descripcion">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Archivo XML</label>
                                                <input type="file" class="form-control" id="xml" name="xml" placeholder="Archivo XML">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div id="result_xml"></div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-block btn-primary" id="save_xml"><i class="fa fa-save"></i>&nbsp;&nbsp;Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- Footer -->
    <footer class="app-footer">
        <span class="float-right">v0.00</span>
    </footer>
</body>
<script src="<?php echo base_url('node_modules/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('node_modules/popper.js/dist/umd/popper.min.js'); ?>"></script>
<script src="<?php echo base_url('node_modules/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('node_modules/pace-progress/pace.min.js'); ?>"></script>
<script src="<?php echo base_url('node_modules/js/app.js'); ?>"></script>
<script src="<?php echo base_url('node_modules/validate/jquery.validate.js')?>"></script>
<script src="<?php echo base_url('node_modules/input-file/input-file.js')?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#save_xml').click(function() {
            $('#form_xml').validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 50
                        },
                    xml: {
                        required: true,
                    },
                        
                },
                messages: {
                    name: {
                        required: 'Ingrese la Descripcion',
                        maxlength: 'Ingrese maximo 50 caracteres'
                    },
                    xml: {
                        required: 'Selecc. el Archivo',
                    }
                },
                submitHandler: function(procesando){
                    event.preventDefault();
                    var datos = new FormData(document.getElementById('form_xml'));  
                    $.ajax({
                        url: '<?php echo site_url('dashboard/guardar_xml/')?>',
                        type: 'POST',
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        beforeSend:function(cargando){
                            $('#result_xml').html('<p class="alert-loading"><i class="fa fa-refresh fa-spin"></i>&nbsp;&nbsp;Guardando...</p>');
                        },
                        success: function(respuesta){
                            $('#result_xml').html(respuesta);
                            if(respuesta.search('Guardado') != -1){
                                window.location.replace('<?php echo site_url('record/'); ?>');
                            }
                        },
                        error: function(error) {
                            $('#result_xml').html('<p class="alert-error"><i class="fa fa-exclamation-triangle"></i>&nbsp;&nbsp;Error...</p>');
                        },
                    });
                }
            });
        });
        $('#xml').fileinput({
            uploadUrl: '<?php echo base_url(); ?>',
            allowedFileExtensions : ['xml'],
            uploadAsync: true,
            minFileCount: 1,
            maxFileCount: 1,
            overwriteInitial: false,
            initialPreviewAsData: true, 
            initialPreviewFileType: 'image',
        });
    });
</script>
</html>