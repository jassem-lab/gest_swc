<?php include ('headers/navbar.php') ?>
<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
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
    $nom = addslashes($_POST["prenom"]);
    $prenom = addslashes($_POST["prenom"]);
    $specialite = addslashes($_POST["specialite"]);
    $telephone = addslashes($_POST["telephone"]);
    $email = addslashes($_POST["email"]);
    $naissance = addslashes($_POST["naissance"]);
    $ville = addslashes($_POST["ville"]);
    $active = 1 ;
    $inscription = $dateheure;

    $sql = "INSERT INTO `swc_profs`(`id`,`nom`,`prenom`,`specialite`,`telephone`,`email`,`cours`,`naissance`,`ville`,`active`,`joined`) VALUES
		('" . $id . "','" . $nom . "','" . $prenom . "' , '" . $specialite . "', '" . $telephone . "', '" . $email . "', '" . $cours . "', '" . $naissance . "', '" . $ville . "','" . $active . "','" . $inscription . "' )";

    $dateheure = date('Y-m-d H:i:s');
    $iduser = $_SESSION['user'];

    $sql1 = "INSERT INTO `swc_logs`(`dateheure`, `name`, `action`, `iddocument`) VALUES ('" . $dateheure . "','" . $iduser . "','new prof added','" . $id . "')";

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

    $sql1 = "INSERT INTO `swc_logs`(`dateheure`, `name`, `action`, `iddocument`) VALUES ('" . $dateheure . "','" . $iduser . "','new prof added','" . $id . "')";


    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="gesteleve.php" </SCRIPT>';
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
                            <h4 class=".card-title">Gestion des Enseignants</h4>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation row" novalidate>
                                <div class="mb-3 col-lg-3">
                                    <label class="form-label" for="validationCustom01">Nom</label>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Nom"
                                        value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-3">
                                    <label class="form-label" for="validationCustom02">Prénom</label>
                                    <input type="text" class="form-control" id="validationCustom02" placeholder="Prénom"
                                        value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-3">
                                    <label class="form-label" for="validationCustom02">Spécialité</label>
                                    <input type="text" class="form-control" id="validationCustom02"
                                        placeholder="Nom & Prénom de parent" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-3">
                                    <label class="form-label" for="validationCustomUsername">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        <input type="text" class="form-control" id="validationCustomUsername"
                                            placeholder="Email" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a email.
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-3">
                                    <label class="form-label" for="validationCustom03">Année de Naissance</label>
                                    <input type="date" class="form-control" id="validationCustom03"
                                        placeholder="Année de naissance" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid date.
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-3">
                                    <label class="form-label" for="validationCustom04">Ville</label>
                                    <input type="text" class="form-control" id="validationCustom04" placeholder="Ville"
                                        required>
                                    <div class="invalid-feedback">
                                        Please provide a valid city.
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-3">
                                    <label class="form-label" for="validationCustom05">Numéro Tel</label>
                                    <input type="number" class="form-control" id="validationCustom05" placeholder="Tel"
                                        required>
                                    <div class="invalid-feedback">
                                        Please provide a valid number.
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Submit form</button>
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
                            <h4 class=".card-title">Liste des Enseignants</h4>
                        </div>
                        <div class="card-body">
                            <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Spécialité</th>
                                        <th>Année de naissance</th>
                                        <th>Numéro Téléphone</th>
                                        <th>Email</th>
                                        <th>Ville</th>
                                        <th>Date d'inscription</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $req = "select * from swc_profs";
                                    $query = mysqli_query($conn, $req);
                                    while ($enreg = mysqli_fetch_array($query)) {
                                        $id = $enreg["id"];
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $enreg["nom"] ?>
                                            </td>
                                            <td>
                                                <?php echo $enreg["prenom"] ?>
                                            </td>
                                            <td>
                                                <?php echo $enreg["specialite"] ?>
                                            </td>
                                            <td>
                                                <?php echo $enreg["naissance"] ?>
                                            </td>
                                            <td>
                                                <?php echo $enreg["telephone"] ?>
                                            </td>
                                            <td>
                                                <?php echo $enreg["email"] ?>
                                            </td>
                                            <td>
                                                <?php echo $enreg["ville"] ?>
                                            </td>
                                            <td>
                                                <?php echo $enreg["joined"] ?>
                                            </td>
                                            <td>
                                                <?php if ($enreg["active"] != 1 ) {
                                                    echo "Enseignant Non Active";
                                                } else {
                                                    echo "Enseignant est active";
                                                } ?>
                                            </td>
                                            <td> <a href="edit_eleve.php?ID=<?php echo $id; ?>"><i icon-name="file-edit"
                                                        style="color : green ; margin-right:10px "></i></a><a href="Javascript:SupprimerEleve('<?php echo $id; ?>')"><i
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