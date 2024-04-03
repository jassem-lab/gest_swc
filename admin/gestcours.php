

<?php include ('headers/navbar.php') ?>
<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<script>
function Supprimercours(id) {
    if (confirm('Confirmez-vous cette action?')) {
        document.location.href = "supp/supp_cours.php?ID=" + id;
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
    $cours     = addslashes($_POST["cours"]);
    $prix      = addslashes($_POST["prix"]);


    $sql = "INSERT INTO `swc_cours`(`id`,`cours`,`prix`) VALUES
		('" . $id . "','" . $cours . "','" . $prix . "' )";

    $dateheure = date('Y-m-d H:i:s');
    $iduser = $_SESSION['user'];

    $sql1 = "INSERT INTO `swc_logs`(`dateheure`, `name`, `action`, `iddocument`) VALUES ('" . $dateheure . "','" . $iduser . "','new course added','" . $id . "')";

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

    $sql1 = "INSERT INTO `swc_logs`(`dateheure`, `name`, `action`, `iddocument`) VALUES ('" . $dateheure . "','" . $iduser . "','new cours added','" . $id . "')";


    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="gestcours.php" </SCRIPT>';
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
                            <h4 class=".card-title">Gestion des Cours</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" class="needs-validation row" novalidate>
                                <div class="mb-3 col-lg-3">
                                    <label class="form-label" for="validationCustom01">Cours</label>
                                    <input type="text" class="form-control" name="cours" id="validationCustom01"
                                        placeholder="Cours" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-3">
                                    <label class="form-label" for="validationCustom02">prix</label>
                                    <input type="number" class="form-control" name="prix" id="validationCustom02"
                                        placeholder="Prix DT" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-sm-3"><br>
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
                            <h4 class=".card-title">Liste des Cours</h4>
                        </div>
                        <div class="card-body">
                            <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Cours</th>
                                        <th>Prix</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $req = "select * from swc_cours";
                                    $query = mysqli_query($conn, $req);
                                    while ($enreg = mysqli_fetch_array($query)) {
                                        $id = $enreg["id"];
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $enreg["cours"] ?>
                                            </td>
                                            <td>
                                                <?php echo $enreg["prix"] ?> DT
                                            </td>
                                            <td><a href="Javascript:Supprimercours('<?php echo $id; ?>')"><i
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