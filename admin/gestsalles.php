

<?php include ('headers/navbar.php') ?>
<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<script>
function Supprimersalles(id) {
    if (confirm('Confirmez-vous cette action?')) {
        document.location.href = "supp/supp_salles.php?ID=" + id;
    }
}
</script>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "swc";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die('connection failed :' . mysqli_connect_error());
}
if (isset($_POST['enregistrer_mail1'])) {
    $dateheure = date('Y-m-d H:i:s');
    $salle = addslashes($_POST["salle"]);
    $capacite = addslashes($_POST["capacite"]);

    $sql = "INSERT INTO `swc_salles`(`id`,`salle`,`capacite`) VALUES
		('" . $id . "','" . $salle . "','" . $capacite . "' )";

    $dateheure = date('Y-m-d H:i:s');
    $iduser = $_SESSION['user'];

    $sql1 = "INSERT INTO `swc_logs`(`dateheure`, `name`, `action`, `iddocument`) VALUES ('" . $dateheure . "','" . $iduser . "','new salle added','" . $id . "')";

    if (mysqli_query($conn, $sql)) {
        echo ' <br/><div class="alert alert-custom alert-indicator-top indicator-success" role="alert">
            <div class="alert-content">
                <span class="alert-title">Success!</span>
                <span class="alert-text">Paramétrage de base est mis à jour...</span>
            </div>
        </div>';


    } else {
        echo ' <div class="alert alert-custom alert-indicator-bottom indicator-danger" role="alert">
            <div class="alert-content">
                <span class="alert-title">Failed!</span>
            </div>
        </div>' . mysqli_error($conn);
    }
    //Log
    $dateheure = date('Y-m-d H:i:s');
    $iduser = $_SESSION['user'];

    $sql1 = "INSERT INTO `swc_logs`(`dateheure`, `name`, `action`, `iddocument`) VALUES ('" . $dateheure . "','" . $iduser . "','new salle added','" . $id . "')";


    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="gestsalles.php" </SCRIPT>';
}

?>
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class=".card-title">Gestion des Salles</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" class="needs-validation row" novalidate>
                                <div class="mb-3 col-lg-3">
                                    <label class="form-label" for="validationCustom01">Salle</label>
                                    <input type="text" class="form-control" name="salle" id="validationCustom01"
                                        placeholder="Salle" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-3">
                                    <label class="form-label" for="validationCustom02">Capacité</label>
                                    <input type="number" class="form-control" name="capacite" id="validationCustom02"
                                        placeholder="Nombre de place" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-8"><br>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Enregistrer
                                    </button>
                                    <input class="form-control" type="hidden" name="enregistrer_mail1">
                                </div>
                            </form>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class=".card-title">Liste des Salles</h4>
                        </div>
                        <div class="card-body">
                            <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Salle</th>
                                        <th>Capacité</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $req = "select * from swc_salles";
                                    $query = mysqli_query($conn, $req);
                                    while ($enreg = mysqli_fetch_array($query)) {
                                        $id = $enreg["id"];
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $enreg["salle"] ?>
                                            </td>
                                            <td>
                                                <?php echo $enreg["capacite"] ?>
                                            </td>
                                            <td> <a href="Javascript:Supprimersalles('<?php echo $id; ?>')"><i
                                                    icon-name="delete" style="color : red"></i></a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div> <!-- end row-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include ('headers/footer.php') ?>