<?php
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
    $query = sprintf("SELECT * FROM product ORDER BY product.cd_product ASC");
    $dados = mysqli_query($con, $query);
    $total = mysqli_num_rows($dados);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Mercadoria</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css" media="screen">
            td{
                padding: 0.4%;
            }
        </style>
</head>
<body>
    <div class="container-fluid table-responsive">
        <h1>Listagem de Produtos</h1>
            <fieldset class="form-group">
                <table class="table-striped">
                    <thead>
                    <tr>
                      <th>Cod.</th>
                      <th>Nome do Produto</th>
                      <th>Quantidade</th>
                      <th>Price</th>
                      <th>Descrição</th>
                      <th>Negócio</th>
                      <th>Tipo</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
            <?php 
                if($total > 0){
                    $count = 0;
                    while ($linha = mysqli_fetch_assoc($dados)) {
                    //while ($linha = mysqli_fetch_assoc($dados)) {
                        if($linha['cd_bussiness'] == 'C'){
                            $alterB = 'Compra';
                        } else {
                            $alterB = 'Venda';
                        }
                        if($linha['cd_product_type'] == 1){
                            $alterP = 'Eletrônico';
                        } else {
                            if($linha['cd_product_type'] == 2){
                                $alterP = 'Automóvel';
                            } else {
                                $alterP = 'Brinquedo';
                            }
                        }
            ?>
                            <td><?php echo $linha['cd_product']; ?></td>
                            <td><?php echo $linha['name_product']; ?></td>
                            <td><?php echo $linha['amount']; ?></td>
                            <td><?php echo $linha['price']; ?></td>
                            <td><?php echo $linha['description']; ?></td>
                            <td><?php echo $alterB; ?></td>
                            <td><?php echo $alterP; ?></td>
                        </tr>
            <?php
                    }
                    mysqli_free_result($dados);
                } else {
                    echo 'Sem registro de produto!';
                }
            ?>
            </table>
            
            <h2>Ações</h2>
            <fieldset class="form-group">
                <form action="/valemobi/create.html" method="post" accept-charset="utf-8">
                    <input type="submit" value="Criar novo Produto" id="btnCreate" class="btn btn-primary"> 
                    <input type="submit" value="Voltar" id="btnVoltar" onclick="history.go(-1)" class="btn btn-primary"> 
                </form>
                
                
            </fieldset>

    
    </div>
</body>
</html>