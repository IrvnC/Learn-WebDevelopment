<?php 
    require_once('connectDatabase.php');
    $dbku = new connect_database();
    $dbku->connection_DB();

    $invoice = $_GET["invoice"];

    if($dbku->hapus_data($invoice) > 0 ) {
        echo "
                <script>
                    alert('data deleted successfully!');
                    document.location.href = 'index.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('data failed to delete!');
                    document.location.href = 'index.php';
                </script>
            ";
    }

?>