<div class="row">
<div class="col-lg-4" ></div>
    <div class="col-lg-4" style="margin-top: 20px">
        <div class="card card-default">
            <div class="card-heading" style="padding-top: 30px; text-align: center; ">
                <img src="<?= base_url('assets/imagenes/icono.png') ?>" height="150px"><br><br>
               Renovar Contraseña
            </div>
            <div class="card-body">
                <form id="form_renovacion">
                    <input type="hidden" name="token" value="<?= $token ?>">
                    <div class="col col-xs-12">
                        <label><i class="fa fa-lock" aria-hidden="true"></i> Nueva Contraseña
                            <input type="password" name="clave" class="form-control">
                        </label>
                    </div>
                    <div class="col col-xs-12">
                        <label><i class="fa fa-lock" aria-hidden="true"></i> Repite Contraseña
                            <input type="password" name="clave2" class="form-control">
                        </label>
                    </div>
                    <div class="col col-xs-12">
                        <br>
                        <button type="submit" class="btn btn-success boton" style="width: 100%"><i class="fa fa-refresh" aria-hidden="true"></i> Actualizar contraseña</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>  
</body>
<footer>
    <!--JQuery-->
    <script type="text/javascript" src="<?= base_url('assets/js/jquery.js?').date('i:s') ?>"></script>

    <!-- General -->
    <script type="text/javascript" src="<?= base_url('assets/js/general.js?').date('i:s') ?>"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="<?= base_url('assets/js/bootstrap.js?').date('i:s') ?>"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#form_renovacion").submit(function(e){
                e.preventDefault();
                renovacion_form();
            })
            function renovacion_form(){
                $(".boton").hide();
                $.post("<?= site_url('app/renovacion_clave_ok')?>",$("#form_renovacion").serialize(),function(r){
                    $(".boton").show();
                    var r = r.split("|");
                    if(r[0]=='0'){ //error
                        alert(r[1]);
                    }else{
                        alert("Contraseña Actualizada :)");
                        //window.location.replace("https://tortasdonponcho.com");
                    }
                })
            }
        });
    </script>
</footer>
</html>
 
    
