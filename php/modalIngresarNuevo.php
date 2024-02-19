



    <div class="modal fade" id="modalNuevo" tabindex="-1" aria-labelledby="modalNuevo" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" >Nuevo producto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <form id="formIngresar" accept-charset="utf-8"  enctype="multipart/form-data" >
                            
                        <div  class="form-group">
                            <label for="modelo_ingresar" class="control-label" >modelo: </label>
                            <input type="text" id="modelo_ingresar" class="form-control" name="modelo" required>
                        </div>    

                        <div  class="form-group">
                            <label for="precio_ingresar" class="control-label" >precio: </label>
                            <input type="text" id="precio_ingresar" class="form-control" name="precio" required>
                        </div>    

                        <div  class="form-group">
                            <label for="marca_ingresar" class="control-label" >marca</label>
                            <select id="marca_ingresar" name="marca" class="form-control" required>
                                <option value="null">-</option>

                                <?php 
                                    
                                    $con=new db();
                                    $sql="select id_marca, descripcion from marcas";

                                    $result=$con->query($sql);
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
                            <label for="imagen_ingresar" class="control-label" >imagen</label>
                            <input type="file" id="imagen_ingresar"  class="form-control" name="imagen" required>
                        </div>

                        <div  class="form-group">
                            <div><label for="descripcion_ingresar" class="control-label" >descripcion</label></div>
                            <textarea id="descripcion_ingresar"  class="form-control" name="descripcion"  cols="30" rows="10"></textarea>
                        </div>

                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" >ingresar</button> <!--onclick="ingresarNuevo()" --> 
                        </div>
                        
                    </form>
                
                </div>

            </div>
        </div>
    </div>


    