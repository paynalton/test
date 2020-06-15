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
    <link href="<?php echo base_url('node_modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('node_modules/datatables/Buttons-1.5.1/css/buttons.dataTables.css')?>" rel="stylesheet">
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
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    Historial XMLs
                                </div>
                                <div class="card-body">
                                    <table id="table_xmls" class="table table-striped">
                                        <thead>                                        
                                            <tr>
                                                <th>Descripcion</th>
                                                <th>Archivo</th>
                                                <th>Registro</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($archivos_xmls as $archivo_xml) { ?>
                                            <tr>
                                                <td>
                                                    <span class="text-muted"><?php echo $archivo_xml->nombre; ?></span>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url('sources/xml_files/'.$archivo_xml->id.'/'.$archivo_xml->archivo.''); ?>" download><?php echo $archivo_xml->archivo; ?></a>
                                                </td>
                                                <td>
                                                    <p>
                                                        <span class="text-muted">Fecha: </span><?php echo date ("d-m-Y", strtotime($archivo_xml->fecha)); ?></br>
                                                        <span class="text-muted">Hora: </span><?php echo date ("H:i:s", strtotime($archivo_xml->fecha)); ?>
                                                    </p>
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary" onclick="modal_xml(<?php echo $archivo_xml->id;?>)" style="color:#ffffff;">
                                                        <i class="fa fa-eye"></i>&nbsp;&nbsp;Ver Contenido
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modal_xml" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-primary" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Contenido XML</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12" id="result_xml"></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
<script src="<?php echo base_url('node_modules/datatables/DataTables-1.10.16/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('node_modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('node_modules/datatables/Buttons-1.5.1/js/dataTables.buttons.min.js')?>"></script>
<script src="<?php echo base_url('node_modules/datatables/JSZip-2.5.0/jszip.min.js')?>"></script>
<script src="<?php echo base_url('node_modules/datatables/pdfmake-0.1.32/pdfmake.min.js')?>"></script>
<script src="<?php echo base_url('node_modules/datatables/pdfmake-0.1.32/vfs_fonts.js')?>"></script>
<script src="<?php echo base_url('node_modules/datatables/Buttons-1.5.1/js/buttons.html5.min.js')?>"></script>
<script src="<?php echo base_url('node_modules/datatables/Buttons-1.5.1/js/buttons.colVis.min.js')?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#table_xmls').DataTable({
            'lengthChange': false,
            'info': false,
            language: { url: '<?php echo base_url('node_modules/datatables/spanish.json')?>' },
            'order': [[ 0, 'asc' ]],
            'lengthMenu': [[25, 50, 100], [25, 50, 100]],
            'columnDefs': [
                { 'orderable': false, 'targets': 3 }
            ],
            dom: 'Bfrtip',
            buttons: [
                'excelHtml5',
                'csvHtml5',
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                },
                {
                    text: '<i class="fa fa-filter"></i>&nbsp;&nbsp;Ver Columnas',
                    extend: 'colvis',
                }
            ]
        });
    });
    function modal_xml(id) {
        $.ajax({
            url : '<?php echo site_url('record/info_xml/')?>'+id+'/',
            type: 'POST',
            success: function(respuesta) {
                $('#result_xml').html(respuesta);
            },
            error: function(error) {
                $('#result_xml').html('<p class="alert-error"><i class="fa fa-exclamation-triangle"></i>&nbsp;&nbsp;Error...</p>');
            }
        });
        $('#modal_xml').modal('show');
    }
</script>
</html>