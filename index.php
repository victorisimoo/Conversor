<?php 
    $valor = '';
    $desde = '';
    $hasta = '';

    function convertir_a_metros($valor, $unidad_medida){
        switch($unidad_medida){
            case 'Milimetro':
                return $valor / 1000;
            break;
            case 'Centimetro':
                return $valor / 100;
            break;
            case 'Decimetro':
                return $valor / 10;
            break;
            case 'Metro':
                return $valor;
            break;
            case  "Decametro":
                return $valor * 10;
            return;
            case 'Hectometro':
                return $valor * 100;
            break;
            case 'Kilometro':
                return $valor * 1000;
            break;
            default:
                return 'Unidad de medida no soportada';
            break;
        }

    }

    //Convertimos a la medida desde metros
    function convertir_desde_metros($valor, $unidad_hasta){

        switch ($unidad_hasta) {
            case 'Milimetro':
                return $valor * 1000;
            break;
            case 'Centimetro':
                return $valor * 100;
            break;
            case 'Decimetro':
                return $valor * 10;
            break;
            case 'Metro':
                return $valor * 1;
            break;
            case 'Decametro':
                return $valor / 10;
            break;
            case 'Hectometro':
                return $valor / 100;
            break;
            case 'Kilometro':
                return $valor / 1000;
            break;            
            default:
                return 'Unidad de medida no soportada';
            break;
        }
    }

    if(isset($_POST['valor'])){
        $valor = $_POST['valor'];
        $desde = $_POST['desde'];
        $hasta = $_POST['hasta'];

        $calculoDesde = convertir_a_metros($valor, $desde);
        $calculaHasta = convertir_desde_metros($calculoDesde, $hasta);
        $resultado = $calculaHasta;
    }
?>



<?php include("includes/header.php")?>

<br>
<h1 class="text-center">Conversor de Longitud</h1>
<div class="container">
    <form method="POST">
    <div class="row mt-4">

        <div class="col-sm-4">
            <div>
                <label for="valor" class="form-label">Valor:</label>
                <input type="number" name="valor" class="form-control" value="<?php if(isset($_POST['valor'])) { echo $_POST['valor']; } ?>">                
            </div>
        </div>
        
            <div class="col-sm-4">
                <label for="desde" class="form-label">Desde: </label>
                <select class="form-select" name="desde">    
                        <option value="">--Selecciona un valor--</option>                       
                        <option value="Milimetro" <?php if(isset($_POST['desde']) && $_POST['desde'] == 'Milimetro') { echo 'selected'; } ?>>Milímetro</option>
                        <option value="Centimetro" <?php if(isset($_POST['desde']) && $_POST['desde'] == 'Centimetro') { echo 'selected'; } ?>>Centímetro</option>
                        <option value="Decimetro" <?php if(isset($_POST['desde']) && $_POST['desde'] == 'Decimetro') { echo 'selected'; } ?>>Decímetro</option>
                        <option value="Metro" <?php if(isset($_POST['desde']) && $_POST['desde'] == 'Metro') { echo 'selected'; } ?>>Metro</option>
                        <option value="Decametro" <?php if(isset($_POST['desde']) && $_POST['desde'] == 'Decametro') { echo 'selected'; } ?>>Decámetro</option>
                        <option value="Hectometro" <?php if(isset($_POST['desde']) && $_POST['desde'] == 'Hectometro') { echo 'selected'; } ?>>Hectómetro</option>
                        <option value="Kilometro" <?php if(isset($_POST['desde']) && $_POST['desde'] == 'Kilometro') { echo 'selected'; } ?>>Kilómetro</option>
                </select>
            
            
            </div>

            <div class="col-sm-4">
                    <label for="desde" class="form-label">Hasta: </label>
                    <select class="form-select" name="hasta">
                    <option value="">--Selecciona un valor--</option>
                    <option value="Milimetro" <?php if(isset($_POST['hasta']) && $_POST['hasta'] == 'Milimetro') { echo 'selected'; } ?>>Milímetro</option>
                        <option value="Centimetro" <?php if(isset($_POST['hasta']) && $_POST['hasta'] == 'Centimetro') { echo 'selected'; } ?>>Centímetro</option>
                        <option value="Decimetro" <?php if(isset($_POST['hasta']) && $_POST['hasta'] == 'Decimetro') { echo 'selected'; } ?>>Decímetro</option>
                        <option value="Metro" <?php if(isset($_POST['hasta']) && $_POST['hasta'] == 'Metro') { echo 'selected'; } ?>>Metro</option>
                        <option value="Decametro" <?php if(isset($_POST['hasta']) && $_POST['hasta'] == 'Decametro') { echo 'selected'; } ?>>Decámetro</option>
                        <option value="Hectometro" <?php if(isset($_POST['hasta']) && $_POST['hasta'] == 'Hectometro') { echo 'selected'; } ?>>Hectómetro</option>
                        <option value="Kilometro" <?php if(isset($_POST['hasta']) && $_POST['hasta'] == 'Kilometro') { echo 'selected'; } ?>>Kilómetro</option>                            
                    </select>              
            </div>
        
    </div>  

    <div class="row mt-4">
        <div class="col-sm-6">
            <button type="submit" name="convertir" class="btn btn-primary w-100 py-4">Convertir</button>
        </div>
            
        <div class="col-sm-6">
            <div class="mb-3">
                <label for="resultado" class="form-label">Resultado:</label>
                <input type="text" name="resultado" class="form-control" value="<?php if(isset($resultado)) echo $resultado; ?>">                
            </div>
        </div>
    </div> 
</form>     
</div>
<?php include("includes/footer.php")?>