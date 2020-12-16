<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
    <title>Document</title>
</head>
<body>
    <div class="container my-4">
        <!--<ul class="nav justify-content-center nav-pills">
            <li class="nav-item">
                <a class="nav-link active" href="products.php">Productos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Ventas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Detalle</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Promociones</a>
            </li>
        </ul>--> 

        <div class="card">
            <div class="card-header">    
                <h5>Productos</h5>
            </div>
            <div class="card-body">
                <div class="w-100 my-2">
                    <button class="btn btn-primary" data-toggle="modal" id="btnAdd">Registrar</button>
                </div>
                <div class="mt-4">
                <div class="table-responsive p-2">
                    <table id="table-products" class="table table-striped table-bordered w-100">
                        <thead class="">
                            <tr>
                                <th>Nombre</th>
                                <th>Stock</th>
                                <th>Detalle</th>
                                <th>Categoria</th>
                                <th>Vencimiento</th>
                                <th>Actualizar</th>
                            </tr>
                        </thead>

                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-add-product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modal-title">Registrar Producto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="form-add-product">    
                <input type="text" class="form-control" id="id" name="id" placeholder="" hidden>
                <div class="row">
                    <div class="col-6 form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="">
                    </div>
                    <div class="col-6 form-group">
                        <label>Cantidad</label>
                        <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="">
                    </div>
                    <div class="col-6 form-group">
                        <label>Categoria</label>
                        <select class="form-control" id="categoria" name="categoria">
                        </select>
                    </div> 
                    <div class="col-6 form-group">
                        <label>Precio</label>
                        <input type="text" class="form-control" id="precio" name="precio" placeholder="">
                    </div>   
                    <div class="col-6 form-group">
                        <label>Proveedor</label>
                        <select class="form-control" id="proveedor" name="proveedor">
                        </select>                    
                        </div>   
                    <div class="col-6 form-group">
                        <label>Estado</label>
                        <input type="text" class="form-control" id="estado" name="estado" placeholder="">
                    </div>    
                    <div class="col-6 form-group">
                        <label>Vencimiento</label>
                        <input type="date" class="form-control" id="vencimiento" name="vencimiento" placeholder="">
                    </div> 
                    <div class="col-6 form-group">
                        <label>Descripción</label>
                        <textarea name="descripcion" id="descripcion" cols="30" rows="2" class="form-control"></textarea>
                    </div>               
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="btnSave">Registrar</button>
        </div>
        </div>
    </div>
    </div>

    
    <script src="jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>

    <script>
        var icon = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>`;

        
        let tb_data = $('#table-products').DataTable({
                ajax: {
                    url: 'all-products',
                    dataSrc: 'data'
                },
                columns: [
                    { data: "nombre_art" },
                    { data: "cantidad_art" },
                    { data: "descripcion_art" },
                    { data: "categoria" },
                    { data: "vencimiento_art" },
                    { 
                        data: "id_art" ,
                        render: function(){
                            return '<button type="button" class="edit btn btn-warning">'+icon+'</button>';
                        }
                    }
                ],
            });

        $('#btnAdd').click(function() {
            clearinput();
            $('#modal-title').html('Registrar producto');
            // $('#id').val('');
            // $('#name').val('');
            $('#modal-add-product').modal('show');
        });

        $('#btnSave').click(function() {
            if(validate_data() == false)
                return false;
            let data = $('#form-add-product').serialize();
            
            $.ajax({
                url: 'save-product',
                type: 'post',
                data: data,
                'success': function(response) {
                    response = JSON.parse(response);
                    if(response == true)
                        toastr.success('Se grabó satisfactoramente');
                    else
                        toastr.error('Se ha producido un error');
                    tb_data.ajax.reload();
                    $('#modal-add-product').modal('hide');
                }
            });
        });

        $('body').on('click', '.edit', function() {
            clearinput();
            $('#modal-title').html('Actualizar producto');
            let data = tb_data.row( $(this).parents('tr') ).data();
            $('#id').val(data['id_art']);
            $('#nombre').val(data['nombre_art']);
            $('#descripcion').val(data['descripcion_art']);
            $('#categoria').val(data['id_cat']);
            $('#proveedor').val(data['id_pro01']);
            $('#cantidad').val(data['cantidad_art']);
            $('#precio').val(data['precio_art']);
            $('#estado').val(data['estado_art']);
            $('#vencimiento').val(data['vencimiento_art']);
            $('#modal-add-product').modal('show');
        });

        function clearinput(){
            $('#id').val('');
            $('#nombre').val('');
            $('#descripcion').val('');
            $('#categoria').val(1);
            $('#proveedor').val(1);
            $('#vencimiento').val('');
            $('#cantidad').val('');
            $('#precio').val('');
            $('#estado').val('');
        }

        /* Llenamos los campos de tipo select */
        $.ajax({
                url: 'all-categories',
                type: 'get',
                'success': function(response) {
                    response = JSON.parse(response);
                    let output = '';
                    for(let i = 0; i < Object.keys(response).length; i++)
                    {  
                        output += `<option value="`+response[i]['id_cat']+`">`+response[i]['nombre_cat']+`</option>`;
                    }
                    $('#categoria').html(output);
                }
            });

        $.ajax({
            url: 'all-providers',
            type: 'get',
            'success': function(response) {
                response = JSON.parse(response);
                let output = '';
                for(let i = 0; i < Object.keys(response).length; i++)
                {  
                    output += `<option value="`+response[i]['id_pro']+`">`+response[i]['nombre_pro']+`</option>`;
                }
                $('#proveedor').html(output);
            }
        });

        function validate_data(){
            return true;
        }

    </script>
</body>
</html>