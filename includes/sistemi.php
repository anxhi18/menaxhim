<?php
ob_start();
session_start();

if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
} else {
    header("Location: ../logout.php");
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>


        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->	

        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!--===============================================================================================-->
        <link href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <!--===============================================================================================-->
        <link href="../vendor/animate/animate.css" rel="stylesheet" type="text/css"/>
        <!--===============================================================================================-->
        <link href="../vendor/select2/select2.min.css" rel="stylesheet" type="text/css"/>
        <link href="../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css"/>
        <!--===============================================================================================-->
        <link href="../css/main.css" rel="stylesheet" type="text/css"/>
        <link href="../css/util.css" rel="stylesheet" type="text/css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!--===============================================================================================-->

    </head>
    <body>
        <?php
        include '../database/conn.php';

        function dateDiff($date, $data) {
            $date1_ts = strtotime($date);
            $date2_ts = strtotime($data);
            $diff = $date1_ts - $date2_ts;
            return round($diff / 86400);
        }
        ?>


        <script>
            function myFunction(val) {
                var va11 = document.getElementById('data').value;

                var arr = va11.split("-");
                year = (arr[0]);
                month = (arr[1]);
                day = (arr[2]);
                if (day === '01' || day === '30' || day === '31') {
                    window.history.pushState('', '', 'sistemi.php?day=' + day);
                    window.location.reload();
                } else {
                    window.history.pushState('', '', 'sistemi.php?datee=' + va11);
                    window.location.reload();
                }


            }


            function findTotal() {
                document.getElementById("Pagesa2").value = "";
                var quantita = parseInt(document.getElementById("Paga2").value);
                var unitario = parseInt(document.getElementById("ore2").value);
                var tot = quantita * unitario;
                document.getElementById("Pagesa2").value = tot;
            }
            ;

        </script>

        <div class="limiter">
            <div class="container-table100">
                <div class="wrap-table100">


                    <div class="wrap-table100">
                        <div class="table100 ver1 m-b-110">
                            <a href="../logout.php" class="btn"  style="background-color: black; color: white" name="shto">Logout </a>
                            <h1 style="text-align: center;"><strong>Sistemi Menaxhimit</strong></h1>
                            <a style="background-color: black; color: white" style="background-color: black; color: white;" data-toggle="modal" data-target="#modalinsert"   href="insertPunonjes.php" class="btn">Shto</a>
                            <input type="date" name="data"  id="data" onchange="myFunction();
                                   "

                                   min="2021-01-01" max="2021-12-31"/>



                            <?php
                            include '../database/DatabaseClass.php';
                            $data = new DatabaseClass();

                            if (isset($_GET['day'])) {
                                $day = $_GET['day'];
                                if ($day == '1') {
                                    ?>

                                    <div id="modalinsert" class="modal fade bd-example-modal-lg">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">

                                                </div>
                                                <div class="modal-body">
                                                    <div class="wrapper">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-md-8 col-md-offset-2">
                                                                    <form method="post">
                                                                        <div class="form-group">
                                                                            <label for="Emri"> Emri:</label>
                                                                            <input type="text" class="form-control" id="Emri" name="Emri" placeholder="Emri">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="Mbiemri">Mbiemri:</label>
                                                                            <input type="text" class="form-control" id="Mbiemri" name="Mbiemri" placeholder="Mbiemri">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="Puna">Pozicioni Punes</label>
                                                                            <select class="form-control" name="Puna"  id="Puna" >
                                                                                <option>Doktor</option>
                                                                                <option>Infermier</option>
                                                                                <option>Sanitar</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="Paga">Paga per Ore:</label>
                                                                            <input type="text" class="form-control" id="Paga" name="Paga" placeholder="Paga">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="Rregjistrimi">Rregjistrimi:</label>
                                                                            <input type="date" name="Rregjistrimi" class="form-control"  id="Rregjistrimi">
                                                                        </div>

                                                                        <button type="submit" class="btn" name="shto" style="background-color: black; color: white" name="shto">Shto</button>
                                                                        <a href="sistemi.php" class="btn"  style="background-color: black; color: white" name="shto">Kthehu </a>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                            }
                            ?>







                            <div class="table100 ver5 m-b-110" >
                                <table data-vertable="ver5">
                                    <thead>
                                        <tr class="row100 head">
                                            <th class="column100 column1" data-column="column1">ID</th>
                                            <th class="column100 column2" data-column="column2">Emer</th>
                                            <th class="column100 column3" data-column="column3">Mbiemer</th>
                                            <th class="column100 column4" data-column="column4">Pozicioni</th>

                                            <th   >Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $post_data = $data->select('punonjesit');
                                        foreach ($post_data as $row) {
                                            ?>
                                            <tr class="row100">
                                                <td class="column100 column1" data-column="column1"><?php echo $row ['id_punonjes']; ?></td>
                                                <td class="column100 column2" data-column="column2"><?php echo $row ['Emer']; ?></td>
                                                <td class="column100 column3" data-column="column3"><?php echo $row ['Mbiemer']; ?></td>
                                                <td  class="column100 column4" data-column="column4"><?php echo $row ['Pozicioni']; ?></td>

                                                <td>  <button type="button" data-toggle="modal" data-target="#modalshiko"   style="background-color: black; color: white" class="btn">Shiko</button>
                                                    <a class="btn btn-warning" href="
                                                    <?php if ($day == '30' || $day == '31') { ?>
                                                           sistemi.php?idPunonjes=<?php echo $row['id_punonjes']
                                                        ?>
                                                           <?php
                                                       }
                                                       ?>
                                                       " onclick="return confirm('Je i sigurt qe do ta fshish kete punonjes')">Fshi</a>
                                                </td>

                                                <!-- Modal HTML Markup -->
                                        <div id="modalshiko" class="modal fade bd-example-modal-lg">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title text-xs-center"> </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" id="form">
                                                            <div class="form-group">
                                                                <input type="hidden" class="form-control" id="idPunonjes" value="<?php echo $row['id_punonjes'] ?>" name="idPunonjes"/>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="Emri"> Emri:</label>
                                                                <input type="text" class="form-control" id="Emri2" value="<?php echo $row['Emer'] ?>" name="Emri2" placeholder="Emri">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="Mbiemri">Mbiemri:</label>
                                                                <input type="text" class="form-control" id="Mbiemri2" value="<?php echo $row['Mbiemer'] ?>" name="Mbiemri2" placeholder="Mbiemri">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Puna">Pozicioni Punes</label>
                                                                <input type="text" class="form-control" id="Puna2" value="<?php echo $row['Pozicioni'] ?>" name="Puna2" placeholder="Puna">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Paga">Paga per Ore:</label>
                                                                <input type="text" class="form-control" id="Paga2" value="<?php
                                                                if (isset($_GET['datee'])) {
                                                                    echo $row['Paga_ore'];
                                                                } else {
                                                                    echo '';
                                                                }
                                                                ?>" name="Paga2" placeholder="Paga2">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Rregjistrimi">Rregjistrimi:</label>
                                                                <input type="text" name="Rregjistrimi2" id="Rregjistrimi2" class="form-control" value="<?php
                                                                $data = $row['start_data_punes'];
                                                                echo $data;
                                                                ?>" id="Rregjistrimi "/>
                                                            </div>


                                                            <?php
                                                            if (isset($_GET['datee'])) {
                                                                $date = $_GET['datee'];



                                                                $dateDiff = dateDiff($date, $data);
                                                                $y = 8;
                                                                $ore_pune = $dateDiff * $y;
                                                            }
                                                            ?>
                                                            <div class="form-group">
                                                                <label for="Paga">Ore pune:</label>
                                                                <input type="text" class="form-control" id="ore2" value="<?php
                                                                if (empty($ore_pune)) {
                                                                    echo '';
                                                                } else {
                                                                    echo $ore_pune;
                                                                }
                                                                ?>" name="ore2" placeholder="ore pune">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Paga">Pagesa:</label>
                                                                <input type="text" class="form-control" id="Pagesa2" onclick="findTotal()"  name="Pagesa2" placeholder="Pagesa">
                                                            </div>

                                                            <a href="sistemi.php" class="btn"  style="background-color: black; color: white" >Kthehu </a>
                                                        </form>

                                                    </div>

                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->

                                        </tr>


                                        <?php
                                    }
                                    ?>


                                    <?php
                                    $data = new DatabaseClass();
                                    if (isset($_POST['shto'])) {
                                        if (isset($_GET['day']) && $day == '1') {
                                            $insert_data = array(
                                                'Emer' => mysqli_real_escape_string($data->con, $_POST['Emri']),
                                                'Mbiemer' => mysqli_real_escape_string($data->con, $_POST['Mbiemri']),
                                                'Pozicioni' => mysqli_real_escape_string($data->con, $_POST['Puna']),
                                                'Paga_ore' => mysqli_real_escape_string($data->con, $_POST['Paga']),
                                                'start_data_punes' => mysqli_real_escape_string($data->con, $_POST['Rregjistrimi'])
                                            );

                                            if ($data->insert('punonjesit', $insert_data)) {
                                                header("Location: sistemi.php");
                                                ob_end_flush();
                                            } else {
                                                echo '<script>alert("te dhenat e punonjesit nuk u inseruan") </script>';
                                            }
                                        } else {
                                            echo 'Nuk mund te shtosh punonjes ';
                                        }
                                    }



                                    if (isset($_GET['idPunonjes'])) {

                                        $id = $_GET['idPunonjes'];
                                        $queryDelete = "Delete from punonjesit where id_punonjes = '" . $id . "'";
                                        if ($conn->query($queryDelete) === TRUE) {
                                            header("Location: sistemi.php");
                                            ob_end_flush();
                                        } else {
                                            echo 'Nuk mund te fshish punonjes ';
                                        }
                                    }



//                                    if (isset($_GET['idPunonjes'])) {
//
////                                    if () {
//                                        $id = $_GET['idPunonjes'];
//                                        $sql = "Delete from punonjesit where id_punonjes = '" . $id . "'";
//
//                                        $result = mysqli_query($conn, $sql);
//                                        if ($result) {
//
//                                            header("Location: sistemi.php");
//                                            ob_end_flush();
//                                        } else {
////                                            echo 'Problem me lidhjen e databazes';
//                                        }
//                                    } else {
//                                        echo 'Nuk mund te fshish punonjes ';
//                                    }
////                                    }
                                    ?>




                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>



        <!--===============================================================================================-->	
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/bootstrap/js/popper.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="js/main.js"></script>

    </body>
</html>