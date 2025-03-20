<?php

require('inc/banco.php');

$id = $_GET['id'] ?? null;

if ($id) {
    
    $query = $pdo->prepare('SELECT * FROM compras WHERE id = :id');
    $query->bindValue(':id', $id);
    $query->execute();
    
    $compra = $query->fetch();

 
    if (!$compra) {
        echo "Compra não encontrada.";
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      
        $link = $_POST['link'];  
        



        
        
        $updateQuery = $pdo->prepare('UPDATE compras SET link = :link WHERE id = :id');
        $updateQuery->bindValue(':link', $link);
        $updateQuery->bindValue(':id', $id);
        $updateQuery->execute();
        
        
        header('Location: compras.php');
        exit;
    }
} else {
    echo "ID não fornecido.";
    exit;
}

?>
