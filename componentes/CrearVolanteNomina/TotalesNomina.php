<div class="card-nomina card">
    <div class="card-body">
        <div class="container-fluid">
            <?php include_once('../componentes/tblDevengados.php') ?>
        </div>
        <div class="contaier-fluid">

            <div class="row">
                <div class="col-md-3">
                    <!--Empresa-->
                    <div class="form-group">
                        <label for="">Quincena</label>
                        <input type="text" placeholder="$" class="form-control" id="Quincena" name="Quincena" value="0">
                    </div>
                </div>
                <div class="col-md-3">
                    <!--Empresa-->
                    <div class="form-group">
                        <label for="">Total Devengado</label>
                        <input type="text" placeholder="$" class="form-control" id="TotalDevengado" name="TotalDevengado" value="0">
                    </div>
                </div>
                <div class="col-md-3">
                    <!--valor devengado-->
                    <div class="form-group">
                        <label for="">Total Deducido</label>
                        <input type="text" placeholder="$" class="form-control " id="TotalDeducido"name="TotalDeducido" value="0">
                    </div>
                </div>
                <div class="col-md-3">
                    <!--valor devengado-->
                    <div class="form-group">
                        <label for="">Total</label>
                        <input type="text" placeholder="$" class="form-control " id="TotalNomina" name="TotalNomina" value="0">
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-4 d-flex justify-content-center">
                <div class="col-md-4 ">
                    <!--Boton guardar devengado-->
                    <div class="form-group ">
                        <button type="button" class=" form-control py-3 btn btn-success" id="GuardarVolante">
                        <i class="fas fa-save"></i>
                         Guardar Volante</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>