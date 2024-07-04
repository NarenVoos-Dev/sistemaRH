<div class="card-nomina card">
    <div class="card-body mb-2">
        <div class="row container-fluid d-flex  align-items-center">
            <h6 class="text-center">DEVENGADOS</h6>
        </div>
       
        <div class="contaier-fluid">
            <form id="CrearDevengado" class="mt-4">
                <div class="row" id="">
                    <div class="col-md-4">
                        <!--Empresa-->
                        <div class="form-group">
                            <label for="">MOTIVO DE DEVENGADO</label>
                            <select class="form-control" id="selectMotivoDevengado" name="selectMotivoDevengado"></select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!--Empresa-->
                        <div class="form-group">
                            <label for="">DESCRIPCION DEL MOTIVO</label>
                            <input type="text" class="form-control" id="DescripMotivo" name="DescripMotivo">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!--valor devengado-->
                        <div class="form-group">
                            <label for="">VALOR DEVENGADO</label>
                            <input type="text" placeholder="$" class="form-control valor" id="ValorDevengado" name="ValorDevengado">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-4 d-flex justify-content-center">
                    <div class="col-md-4 ">
                            <!--Boton guardar devengado-->
                        <div class="form-group ">
                            <button type="submit"  class=" form-control btn btn-success" ><i class="fas fa-plus-circle"></i> AGREGAR</button>
                        </div>
                    </div>
                </div>            
            </form>

        </div>
    </div>
    
    
</div>