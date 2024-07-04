<div class="card-nomina card">
    <div class="card-body">
        <div class="row container-fluid d-flex  align-items-center">
            <h6 class="text-center">DEDUCCIONES</h6>
        </div>
       
        <div class="contaier-fluid">
            <form id="CrearDeduccido" class="mt-4">
                <div class="row" id="">
                    <div class="col-md-4">
                        <!--Empresa-->
                        <div class="form-group">
                            <label for="">MOTIVO DE DEDUCCION</label>
                            <select class="form-control" id="selectMotivoDeduccion" name="selectMotivoDeduccion"></select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!--Empresa-->
                        <div class="form-group">
                            <label for="">DESCRIPCION DEL MOTIVO</label>
                            <input type="text" class="form-control" id="DescripMotivoDeduccion" name="DescripMotivoDeduccion">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!--valor devengado-->
                        <div class="form-group">
                            <label for="">VALOR DEDUCCIDO</label>
                            <input type="text" placeholder="$" class="form-control valor" id="ValorDeducido" name="ValorDeducido">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-4 d-flex justify-content-center">
                    <div class="col-md-4 ">
                            <!--Boton guardar devengado-->
                        <div class="form-group ">
                            <button type="submit"  class=" form-control btn btn-success" >
                                
                            <i class="fas fa-plus-circle"></i>
                                AGREGAR</button>
                        </div>
                    </div>
                </div>            
            </form>

        </div>
        </form>

    </div>
</div>