<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Trabajadores</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <button title="Agregar" type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddModal">
                        <i class="fas fa-plus"></i> Agregar Nuevo Trabajador
                    </button>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class card">
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Trabajador</th>
                                    <th>Cedula</th>
                                    <th>Correo</th>
                                    <th>Dirección</th>
                                    <th>Salario</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($res)) :
                                ?>
                                    <tr>
                                        <td><?php echo $row['nombre'] ?></td>
                                        <td><?php echo $row['cedula'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['direccion'] ?></td>
                                        <td><?php echo $row['salario'] ?></td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <a title="Modificar Trabajador" data-toggle="modal" data-target="#EditModal" href="javascript:void(0);" onclick="document.getElementById('id').value = <?= $row['id'] ?>;document.getElementById('nombre').value = '<?= $row['nombre'] ?>';document.getElementById('cedula').value = '<?= $row['cedula'] ?>';document.getElementById('email').value = '<?= $row['email'] ?>';document.getElementById('direccion').value = '<?= $row['direccion'] ?>';document.getElementById('salario').value = '<?= $row['salario'] ?>';" class="btn btn-success btn-sm">
                                                        <i class="fas fa-edit"></i> Modificar
                                                    </a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <a title="Eliminar Trabajador" data-toggle="modal" data-target="#DeleteModal" href="javascript:void(0);" onclick="document.getElementById('delete_id').value = <?= $row['id'] ?>;document.getElementById('delete_nombre').innerHTML = '<?= $row['nombre'] ?>';" class="btn btn-danger btn-sm borrar">
                                                        <i class="fas fa-trash"></i> Eliminar
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<div class="modal fade" id="AddModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="defaultModalLabel">Agregar Nuevo Trabajador</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=trabajadores" id="ingresar" method="POST">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="add_nombre" id="add_nombre" class="form-control" placeholder="Nombres del Trabajador" onkeypress="return validarTexto(event)" required>
                    </div>
                    <div class="form-group">
                        <label>Cedula</label>
                        <input type="text" name="add_cedula" id="add_cedula" class="form-control" placeholder="Cedula del Trabajador" onkeypress="return validarNumero(event)" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="add_email" id="add_email" class="form-control" placeholder="Email del Trabajador" required>
                    </div>
                    <div class="form-group">
                        <label>Dirección</label>
                        <input type="text" name="add_direccion" id="add_direccion" class="form-control" placeholder="Dirección del Trabajador" required>
                    </div>
                    <div class="form-group">
                        <label>Salario</label>
                        <input type="text" name="add_salario" id="add_salario" class="form-control" placeholder="Salario del Trabajador" onkeypress="return validarDecimal(event)" required>
                    </div>

                    <input type="submit" name="ingresar_trabajador" Value="Registrar" class="btn btn-primary">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="EditModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title" id="defaultModalLabel">Editar Trabajador</h4>
            </div>
            <div class="modal-body">

                <form action="panel.php?modulo=trabajadores" method="POST">
                    <input type="hidden" name="id" id="id" value="">

                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" onkeypress="return validarTexto(event)" required>
                    </div>
                    <div class="form-group">
                        <label>Cedula</label>
                        <input type="text" name="cedula" id="cedula" class="form-control" onkeypress="return validarNumero(event)" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Dirección</label>
                        <input type="text" name="direccion" id="direccion" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Salario</label>
                        <input type="text" name="salario" id="salario" class="form-control" onkeypress="return validarDecimal(event)" required>
                    </div>

                    <input type="submit" name="modificar_trabajador" id="modificar_trabajador" Value="Actualizar" class="btn btn-success">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title" id="defaultModalLabel">Eliminar Trabajador</h4>
            </div>
            <div class="modal-body">

                <form action="panel.php?modulo=trabajadores" method="POST">
                    <input type="hidden" name="delete_id" id="delete_id" value="">

                    <strong>
                        <p id="delete_nombre"></p>
                    </strong></label>


                    <div class="form-group">
                        <label class="mr-sm-2">¿Deseas Eliminar este Trabajador?</label>
                    </div>

                    <input type="submit" name="eliminar_trabajador" id="eliminar_trabajador" Value="Eliminar" class="btn btn-danger">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>