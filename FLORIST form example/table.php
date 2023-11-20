<?php 

    require_once('connectDatabase.php');
    $dbku = new connect_database();
    $dbku->connection_DB();
    $datasemua = $dbku->tampil_data("SELECT * FROM salesdata");

    // Notification Input
    if( isset($_POST["submit"])){
        if ($dbku->tambah_data($_POST) > 0) {
            echo "
                <script>
                    alert('data added successfully!');
                    document.location.href = 'table.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('data failed to add! please try again');
                    document.location.href = 'table.php';
                </script>
            ";
        }
    }


    // Notification Update
    if( isset($_POST["update-btn"])){

        if ($dbku->update_data($_POST) > 0) {
            echo "
                <script>
                    alert('data updated successfully!');
                    document.location.href = 'table.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('data failed to update! please try again');
                    document.location.href = 'table.php';
                </script>
            ";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Florist Sales Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>

    <!-- Modal Input-->
    <div class="modal fade" id="inputModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sales Data Input</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="table.php?action=add" method="POST">
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="invoice" class="col-sm-3 col-form-label">Invoice Code</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="invoice" name="invoice" required autocomplete="off"placeholder="example : 1234567890">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="TANGGAL" class="col-sm-3 col-form-label">Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="TANGGAL" name="TANGGAL" required autocomplete="off">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="PEMBELI" class="col-sm-3 col-form-label">Buyer's Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control mr-3" id="PEMBELI" name="PEMBELI" required autocomplete="off"placeholder="input buyer's name here">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="KODE_BUNGA" class="col-sm-3 col-form-label">Flower Code</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="KODE_BUNGA" name="KODE_BUNGA" required autocomplete="off"placeholder="example : BS0001">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="BUNGA" class="col-sm-3 col-form-label">Flower's Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="BUNGA" name="BUNGA" required autocomplete="off"placeholder="input flower name here">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="JUMLAH" class="col-sm-3 col-form-label">Number of Buying</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="JUMLAH" name="JUMLAH" required autocomplete="off"placeholder="input the number of buying here in unit (int)">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="HARGA" class="col-sm-3 col-form-label">Total Price</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="HARGA" name="HARGA" required autocomplete="off"placeholder="input total price here (int)">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="submit">Save</button>
                    </div>
                </form>
            </div>  
        </div>
    </div>



    <!-- Modal Update-->
    <style>
        body {background-color: maroon;}
        h2 {background-color: maroon; color: #fff;}
        table {background-color: pink; color: #fff;}
    </style>
    <div class="modal fade" id="updatemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sales Data Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="table.php" method="POST">
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="updateinvoice" class="col-sm-3 col-form-label">Invoice Code</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="updateinvoice" name="invoice" required autocomplete="off">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="updateTANGGAL" class="col-sm-3 col-form-label">Buying Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="updateTANGGAL" name="TANGGAL" required autocomplete="off">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="updatePEMBELI" class="col-sm-3 col-form-label">Buyer's Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="updatePEMBELI" name="PEMBELI" required autocomplete="off">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="updateKODE_BUNGA" class="col-sm-3 col-form-label">Flower Code</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control mr-3" id="updateKODE_BUNGA" name="KODE_BUNGA" required autocomplete="off">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="updateBUNGA" class="col-sm-3 col-form-label">Flower Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="updateBUNGA" name="BUNGA" required autocomplete="off">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="updateJUMLAH" class="col-sm-3 col-form-label">Number of Buying</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="updateJUMLAH" name="JUMLAH" required autocomplete="off">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="updateHARGA" class="col-sm-3 col-form-label">Total Price</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="updateHARGA" name="HARGA" required autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="update-btn">Save</button>
                    </div>
                </form>
            </div>  
        </div>
    </div>


    <!-- Container Form-->
    <div class="container"><a name="atas"></a>
        <div class="jumbotron mt-5">
            <div class="card p-3">
                <h2 align="center">Table of Florist Sales Data</h2>
            </div>
            <div class="card p-4">
                <div class="card-body">
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#inputModal">
                    Input Sales Data
                    </button>
                </div>
                <div class="container mt-3">
                    <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered mb-5" style="text-align:center;">
                        <thead class="table-primary">
                            <th>No</th>
                            <th>Invoice Code </th>
                            <th>Date</th>
                            <th>Buyer</th>
                            <th>Flower Code</th>
                            <th>Flower Name</th>
                            <th>Number of Buying</th>
                            <th>Total Price</th>
                            <th colspan="2">Action</th>  
                        </thead>
                        <tbody>
                        <?php $i = 1 ;?>
                        <?php foreach( $datasemua as $data):?>
                            <tr>
                                <td><?= $i;?></td>
                                <td><?= $data["invoice"];?></td>
                                <td><?= $data["TANGGAL"];?></td>
                                <td><?= $data["PEMBELI"];?></td>
                                <td><?= $data["KODE_BUNGA"];?></td>
                                <td><?= $data["BUNGA"];?></td>
                                <td><?= $data["JUMLAH"];?></td>
                                <td><?= $data["HARGA"];?></td>
                                <td><button type="button" class="btn btn-dark updatebtn">Edit</button></td>
                                <td><button type="button" class="btn btn-danger" onclick="if (confirm('Are you sure you want to delete??')) window.location.href='delete.php?invoice=<?= $data["invoice"];?>';">Delete</button></td>
                            </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
                    <div>
                    <h6 align="right" margin="10">Ungaran, July 31, 2021</h6>
                    <h6 align="right" margin="10">Seller</h6><br><br>
                    <h6 align="right" margin="10">Ernita & Triyani</h6>
                    </div>
                    <div>
                    <a href="logout.php" type="button" class="btn btn-danger"> Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $('.updatebtn').on('click', function(){
                $('#updatemodal').modal('show');

                    $tr = $(this).closest('tr');
                    let data = $tr.children("td").map(function(){
                        return $(this).text();
                    }).get();

                    $('#updateinvoice').val(data[1]);
                    $('#updateTANGGAL').val(data[2]);
                    $('#updatePEMBELI').val(data[3]);
                    $('#updateKODE_BUNGA').val(data[4]);
                    $('#updateBUNGA').val(data[5]);
                    $('#updateJUMLAH').val(data[6]);
                    $('#updateHARGA').val(data[7]);
            });

        });
    </script>

    <footer><center><br><br>
            <h6>copyright@Ernita-Triyani-2021</h6>
            <h7><a href="#atas"><img src="atas.png" width="50" height="50"></h7><br><br><br>
            </center>

    </footer>
</body>
</html>