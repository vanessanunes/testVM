<?php
    /**
     * @autor Vanessa
     */

    if($_POST == '' || $_POST == NULL){
        return header('Location: /valemobi/');
    }
    
    
    define('DB_SERVER', 'localhost');
    define('DB_NAME', 'valemobi_db');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');

    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
    if(!$con){
        echo 'No connection with database.<br>';
    }

    if(!mysqli_select_db($con, 'valemobi_db')){
        echo 'No database connection.<br>';
    }
    
    $name = $_POST['name'];
    $price = $_POST['price'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $bussiness = $_POST['bussiness'];
    $product_type = $_POST['product_type'];
    
    $query = "insert into product(name_product, amount, price, description, cd_bussiness, cd_product_type) "
            . "values('$name', '$amount', '$price', '$description', '$bussiness', '$product_type')";
    
    if(!mysqli_query($con, $query)){
        echo 'Product not insert<br>';
    } 

    //header("Location: index.html");
?>
  
<?php
$name = $_POST['name'];
$price = $_POST['price'];
$amount = $_POST['amount'];
$description = $_POST['description'];
$bussiness = $_POST['bussiness'];
if($bussiness=='C'){
    $alterB = 'Compra';
} else {
    $alterB = 'Venda';
}
$product_type = $_POST['product_type'];
if($product_type=='1'){
    $alterP = 'Eletrônico';
} else{
    if($product_type=='2'){
        $alterP = 'Automóvel';        
    } else {
        if($product_type=='3'){
            $alterP = 'Brinquedo';        
        }
        else{
            $alterP = $product_type;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Mercadoria</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script   src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css" media="screen">
            body{
                text-align: center;
            }    
        </style>
</head>
<body>
    <div class="container-fluid">
        <h1>Produto inserido com sucesso!</h1>
       
            <fieldset class="form-group">
            Nome: <?php echo $name; ?>      
            </fieldset>
            <fieldset class="form-group">
                Quantidade: <?php echo $amount; ?>      
            </fieldset>
            <fieldset class="form-group">
                Preço unitário: <?php echo $price; ?>      
            </fieldset>
            <fieldset class="form-group">
                Descrição: <?php echo $description; ?>      
            </fieldset>
            <fieldset class="form-group">
                Tipo de negócio: <?php echo $alterB; ?>      
            </fieldset>
            <fieldset class="form-group">
                Tipo de produto: <?php echo $alterP; ?>      
            </fieldset>

            <h2>Ações</h2>
            <fieldset class="form-group">
                <form action="/valemobi/cadastro.php" method="post" accept-charset="utf-8" style="margin-bottom: 5px; float: center;">
                    <input type="submit" value="Criar novo Produto" id="btnCreate" class="btn btn-primary"> 
                </form>

                <form action="list.php" method="post" accept-charset="utf-8" style="float: center;">
                    <input type="submit" value="Listagem de Produtos" id="btnCreate" class="btn btn-primary"> 
                </form>
            </fieldset>
       
        
    </div>
    
</body>
</html>

