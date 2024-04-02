

<?php include ('headers/navbar.php') ?>
<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<script>
function SupprimerEleve(id) {
    if (confirm('Confirmez-vous cette action?')) {
        document.location.href = "supp/supp_eleve.php?ID=" + id;
    }
}
</script>
<?php
if(isset($_GET['ID'])){
    $idd = $_GET['ID'];
}else{
    $idd = "0";
}
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
    $parent = addslashes($_POST["parent"]);
    $telephone = addslashes($_POST["telephone"]);
    $email = addslashes($_POST["email"]);
    $cours = addslashes($_POST["cours"]);
    $naissance = addslashes($_POST["naissance"]);
    $ville = addslashes($_POST["ville"]);
    $active = 1 ;
    $inscription = $dateheure;

    $sql = "INSERT INTO `swc_eleves`(`id`,`nom`,`prenom`,`parent`,`telephone`,`email`,`cours`,`naissance`,`ville`,`active`,`inscription`) VALUES
		('" . $id . "','" . $nom . "','" . $prenom . "' , '" . $parent . "', '" . $telephone . "', '" . $email . "', '" . $cours . "', '" . $naissance . "', '" . $ville . "','" . $active . "','" . $inscription . "' )";

    $dateheure = date('Y-m-d H:i:s');
    $iduser = $_SESSION['user'];

    $sql1 = "INSERT INTO `swc_logs`(`dateheure`, `name`, `action`, `iddocument`) VALUES ('" . $dateheure . "','" . $iduser . "','new client added','" . $id . "')";

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

    $sql1 = "INSERT INTO `swc_logs`(`dateheure`, `name`, `action`, `iddocument`) VALUES ('" . $dateheure . "','" . $iduser . "','new client added','" . $id . "')";


    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="gesteleve.php" </SCRIPT>';
}
    $nom		    =	"";
	$prenom			=	"";
    $naissance		=	"";
	$parent			=	"";
	$cours			=	"";
	$email			=	"";
	$tel			=	"";
	$ville			=	"";
	
	$date				=	date("Y-m-d");
	echo $req="select  * from swc_eleves where id=".$idd;
	$query = mysqli_query($conn, $req);
        while ($enreg = mysqli_fetch_array($query)) {
		$nom	    	=	$enreg['nom'];
		$prenom			=	$enreg['prenom'];
		$parent			=	$enreg['parent'];
		$cours			=	$enreg['cours'];
		$email			=	$enreg['email'];
		$tel			=	$enreg['telephone'];
		$ville			=	$enreg['ville'];

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
                            <h4 class=".card-title">Gestion des Eleves</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" class="needs-validation row" novalidate>
                                <div class="mb-3 col-lg-3">
                                    <label class="form-label" for="validationCustom01">Nom</label>
                                    <input type="text" class="form-control" name="nom" value="<?php echo $nom ?>" id="validationCustom01"
                                        placeholder="Nom" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-3">
                                    <label class="form-label" for="validationCustom02">Prénom</label>
                                    <input type="text" class="form-control" name="prenom" value="<?php echo $prenom ?>" id="validationCustom02"
                                        placeholder="Prénom" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-3">
                                    <label class="form-label" for="validationCustom02">Nom & Prénom de parent</label>
                                    <input type="text" class="form-control" name="parent" value="<?php echo $parent ?>" id="validationCustom02"
                                        placeholder="Nom & Prénom de parent" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <!-- <div class="mb-3 col-lg-3">
                                    <label class="form-label" for="validationCustom02">Cours</label>
                                    <input type="text" class="form-control" name="parent" value="<?php echo $cours ?>" id="validationCustom02"
                                        placeholder="Nom & Prénom de parent" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div> -->
                                <div class="mb-3 col-lg-3">
                                    <label class="form-label" for="validationCustomUsername">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        <input type="text" class="form-control" name="email"
                                            id="validationCustomUsername" value="<?php echo $email ?>" placeholder="Email"
                                            aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a email.
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-3">
                                    <label class="form-label" for="validationCustom03">Année de Naissance</label>
                                    <input type="date" class="form-control" value="<?php echo $naissance ?>" name="naissance" id="validationCustom03"
                                        placeholder="Année de naissance" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid date.
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-3">
                                    <label class="form-label" for="validationCustom04">Ville</label>
                                    <input type="text" class="form-control" value="<?php echo $ville ?>" name="ville" id="validationCustom04"
                                        placeholder="Ville" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid city.
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-3">
                                    <label class="form-label" for="validationCustom05">Numéro Tel</label>
                                    <input type="text" class="form-control" value="<?php echo $tel ?>" name="telephone" id="validationCustom05"
                                        placeholder="Tel" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid zip.
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
                            <h4 class=".card-title">Liste des Eleves</h4>
                        </div>
                        <div class="card-body">
                            <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Nom & prenom parent</th>
                                        <th>Année de naissance</th>
                                        <th>Numéro Téléphone</th>
                                        <th>Email</th>
                                        <th>Ville</th>
                                        <th>Date d'inscription</th>
                                        <th>Activité</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $req = "select * from swc_eleves";
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
                                                <?php echo $enreg["parent"] ?>
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
                                                <?php echo $enreg["inscription"] ?>
                                            </td>
                                            <td>
                                                <?php if ($enreg["active"] != 1 ) {
                                                    echo "Eleve Non Active";
                                                } else {
                                                    echo "Eleve est active";
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