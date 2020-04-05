
<?php
 require_once "fonctions.php";

 $nbmot= 0;
 $message='';
 $tabMots = [];
 $errors = [];
 $motAvecM= 0;
if(isset($_POST['submit'])){
    $nbmot = $_POST['nbmot'];
    if(!is_chaine_numeric($nbmot)) {$message= "Veillez saisir un entier";
        $nbmot= 0;
    }else if(is_empty($nbmot)) {$message= "Champ obligatoire";}
    
}
if(isset($_POST['result'])){
   
    $nbmot = $_POST['nbmot'];
    for($i=0 ; $i<$nbmot; $i++){
        $mot= $_POST['mot'.($i)];
        $tabMots[] = $mot;
        if (long_chaine($mot)>20){
            $errors[$i][] = 'Le mot ne doit pas dépasser 20 caractères';
        }
        if (!is_chaine_alpha($mot)){
            $errors[$i][] = 'Des lettres uniquement';
        }
        if (is_car_present_in_chaine(' ',delete_spc_before_after($mot))){
          $errors[$i][] = 'Un seul mot';
      }
        if (is_car_present_in_chaine(delete_spc_before_after($mot),' ')){
            $errors[$i][] = 'Un seul mot';
        }
       
        if(is_empty($mot)){
            $errors[$i][] = 'Champ vide';
        }
    }
    if (empty($errors)){
       $motAvecM=ContientlettreM($tabMots);
    }

}
//var_dump($errors[]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>EXO 1</title>
</head>
<body>

      <fieldset class="bordure">
            <legend class="legende">Combien de mot</legend>
             <form action="" method="POST">
               
                    <input type="text" name="nbmot" value="<?= $nbmot ?>">
                    <p class="erreur" style="color:red"><?= $message ?></p>
                    <input type="submit" name="submit" value="Envoi">
                    <input type="reset" name="reset" value="Annuler">
              
                <div class="gauche">
                    <?php if(empty($message)&& $nbmot>=1) for($i = 0; $i<$nbmot; $i++){ ?>
                    <label for="lot">MOT N°<?= $i+1 ?></label>
                    <input type="text " placeholder="Entrer votre mot" value="<?= isset($tabMots[$i]) ? $tabMots[$i] : '' ?>" name="mot<?= $i ?>" autocomplete="off"><br>
                    <p class="erreurs" style="color:red"><?= isset($errors[$i]) ?'( '. print_error($errors[$i]) .' )' : '' ?></p>
                    <?php } ?>
                    <?php if(empty($message)&& $nbmot>=1){ ?>
                    <input type="submit" name="result" value="Envoi">
                    <?php } ?>  
                </div>
            </form>
         </fieldset>

         <?php if (empty($errors) && isset($_POST['result'])){ ?>

            <p class="afficher">Vous avez saisi <?= $nbmot?> Mot(s) dont <span class="alert alert-success"><?= $motAvecM ?> avec la lettre M</span></p>
      
<?php } ?>

    
</body>
</html>
