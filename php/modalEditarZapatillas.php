


    <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditar" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" >Modificar producto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <form id="formEditar" accept-charset="utf-8"  enctype="multipart/form-data" >
                        
                        <div class="form-group">
                            <label for="id_zapatilla_editar" class="control-label" >id_zapatilla: </label>
                            <input type="text" id="id_zapatilla_editar" class="form-control" name="id_zapatilla_editar" disabled >
                        </div>    
                            
                        <div class="form-group">
                            <label for="modelo_editar" class="control-label">modelo: </label>
                            <input id="modelo_editar" class="form-control" type="text" name="modelo_editar" required>
                        </div>    

                        <div class="form-group">
                            <label for="precio_editar" class="control-label">precio: </label>
                            <input id="precio_editar" class="form-control" type="text" name="precio_editar" required>
                        </div>    

                        <div  class="form-group">
                            <label for="marca_editar" class="control-label" >marca</label>
                            <select id="marca_editar" name="marca_editar" class="form-control" required>
                                <!--<option value="null">-</option> -->

                                <?php 
                                    
                                    $conn=new db();
                                    $sql_marca="select id_marca, descripcion from marcas";

                                    $result=$conn->query($sql_marca);
                                    $row=$result->fetchAll(PDO::FETCH_ASSOC);

                                    foreach($row as $m){

                                ?>
                                    <option value="<?php echo $m["id_marca"] ?>">
                                        <?php echo $m["descripcion"] ?>
                                    </option>

                                <?php } ?>

                            </select>
                        </div>

                        <div  class="form-group">
                            <label for="imagen_editar" class="control-label" >seleccionar imagen</label>
                            <input type="file" id="imagen_editar"  class="form-control" name="imagen">
                            <p id="nombre_imagen"></p>
                        </div>

                        <div  class="form-group">
                            <div><label for="descripcion_editar" class="control-label" >descripcion</label></div>
                            <textarea id="descripcion_editar"  class="form-control" name="descripcion_editar"  cols="30" rows="10"></textarea>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" name="submit_editar" class="btn btn-primary"  value="editar">
                        </div> <!--onclick="editar()"-->
                    </form>
                
                </div>

            </div>
        </div>
    </div>


    