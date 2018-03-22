<?php
require "data.php";

/*if (!empty($_POST)) {

    switch ($_POST) {
    
        case $_POST['getManga']:
            getManga($dbh);
            break;
        case $_POST['deleteMangaById']:
            getManga($dbh);
            break;
        case $_POST['deleteMangaById']:
            $id = $_POST["id"]; 
            deleteMangaById($dbh, $id); 
            break;
        case $_POST['getMangaByIDG']:
            $IDG = $_POST["idg"]; 
            getMangaByIDG($dbh , $IDG); 
            break;
        case $_POST['getMangaById']:
            $id = $_POST["id"]; 
            getMangaById($dbh , $id); 
            break;
        case $_POST['addManga']:
            $inputNom = $_POST["inputNom"]; 
            $inputMangaka = $_POST["inputMangaka"]; 
            $inputImg = $_POST["inputImg"]; 
            $inputIDG = $_POST["inputIDG"]; 
            addManga($dbh, $inputNom, $inputMangaka, $inputImg, $inputIDG); 
            break;
    }
}*/
if ( !empty($_POST["getManga"]) ){
    getManga($dbh);
}

if ( !empty($_POST["deleteMangaById"] && !empty($_POST["id"]) ) ){ 
     $id = $_POST["id"]; 
     deleteMangaById($dbh, $id); 
 }
if ( !empty($_POST["getMangaByIDG"] && !empty($_POST["idg"]) ) ){ 
    $IDG = $_POST["idg"]; 
    getMangaByIDG($dbh , $IDG); 
}
if ( !empty($_POST["getMangaById"] && !empty($_POST["id"]) ) ){ 
    $id = $_POST["id"]; 
    getMangaById($dbh , $id); 
}
if ( !empty($_POST["addManga"]) ){ 
    $inputNom = $_POST["inputNom"]; 
    $inputMangaka = $_POST["inputMangaka"]; 
    $inputImg = $_POST["inputImg"]; 
    $inputIDG = $_POST["inputIDG"]; 
 
    addManga($dbh, $inputNom, $inputMangaka, $inputImg, $inputIDG); 
}
if ( !empty($_POST["updateManga"]) ){ 
    $id = $_POST["id"]; 
    $inputNom = $_POST["inputNom"]; 
    $inputMangaka = $_POST["inputMangaka"]; 
    $inputImg = $_POST["inputImg"]; 
    $inputIDG = $_POST["inputIDG"]; 
 
    updateManga($dbh, $id, $inputNom, $inputMangaka, $inputImg, $inputIDG); 
}

function getGenre($dbh){
    $sql = 'SELECT * FROM genre ORDER BY genre DESC';
    
    echo '<div class="dropdown"><button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Genre</button><div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
    
    foreach ($dbh->query($sql) as $genre){
        echo '<a class="dropdown-item" id="genre" "><p class="'.$genre['id'].'">'.$genre['genre'].'</p></a>';
    }
    echo '</div><br>';
}
function getMangaNom($dbh){
    $sql = 'SELECT * FROM manga ORDER BY nom DESC';
    
    echo '<div class="dropdown"><button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Genre</button><div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
    
    foreach ($dbh->query($sql) as $mangas){
        echo '<a class="nomM dropdown-item" id="genre" "><p class="'.$mangas['id'].'">'.$mangas['nom'].'</p></a>';
    }
    echo '</div><br>';
}

function getManga($dbh){
    $sql =  'SELECT * FROM manga';
    $i = 1;
    
    echo '<table class="table table-striped table-dark"><thead><tr><th scope="col">#</th><th scope="col">Nom</th><th scope="col">Mangaka</th><th scope="col">img</th><th scope="col">Supprimer</th><th scope="col">Edit</th></tr></thead><tbody><tr>';

    foreach  ($dbh->query($sql) as $mangas) {
        echo '<tr><th scope="row">'.$i.'</th><td>'.$mangas['nom'].'</td><td>'.$mangas['mangaka'].'</td><td><img id="imgManga" src=" img/'.$mangas['img'].'"></td><td><button onClick="deleteManga('.$mangas['id'].')" href ="'.$mangas['id'].'" type="button" class="delete btn btn-danger">X</button></td><td><button type="button" class="edit btn btn-success" href="'.$mangas['id'].'" onClick="editModal()">E</button></td></tr>';
        $i++;

  }  
    echo '</tbody></table>';
    
}

function getMangaByIDG($dbh, $IDG){
    $sql = $dbh->prepare("SELECT * FROM manga WHERE IDG =" .$IDG );
    $sql->execute();
    $result = $sql->fetchAll();
    $i = 1;

    echo '<table class="table table-striped table-dark"><thead><tr><th scope="col">#</th><th scope="col">Nom</th><th scope="col">Mangaka</th><th scope="col">img</th><th scope="col">Supprimer</th><th scope="col">Edit</th></tr></thead><tbody><tr>';

    foreach  ($result as $mangas) {
        echo '<tr><th scope="row">'.$i.'</th><td>'.$mangas['nom'].'</td><td>'.$mangas['mangaka'].'</td><td><img id="imgManga" src=" img/'.$mangas['img'].'"></td><td><button onClick="deleteManga('.$mangas['id'].')" href ="'.$mangas['id'].'" type="button" class="delete btn btn-danger">X</button></td><td><button type="button" class="edit btn btn-success" href="'.$mangas['id'].'" onClick="editModal()">E</button></td></tr>';
        $i++;

  }  
    echo '</tbody></table>';
}
function getMangaById($dbh, $id){
    $sql = $dbh->prepare("SELECT * FROM manga WHERE id =" .$id );
    $sql->execute();
    $result = $sql->fetchAll();
    
    foreach ($result as $mangas) {
        echo '<div class="form-row"><div class="form-group col-md-6"><label for="inputNom">nom</label><input type="nom" class="form-control" id="inputNom" value="'.$mangas['nom'].'"></div><div class="form-group col-md-6"><label for="inputMangaka">mangaka</label><input type="mangaka" class="form-control" id="inputMangaka" value="'.$mangas['mangaka'].'"></div></div><div class="form-group"><label for="inputImg">img</label><input type="text" class="form-control" id="inputImg" value="'.$mangas['img'].'" ></div><div class="form-group"><label for="inputIDG">IDG</label><input type="text" class="form-control" id="inputIDG" value="'.$mangas['IDG'].'"></div><button id="edit" type="button" class="btn btn-primary">envoyer</button>';
    }
}

function deleteMangaById($dbh, $id){
    $req = $dbh->exec("DELETE FROM manga WHERE id =" .$id);
    print("tu as supprimer le manga avec l'id " .$id);
}

function addManga($dbh, $inputNom, $inputMangaka, $inputImg, $inputIDG){
  
/*    $nom = '$inputNom';
    $mangaka = '$inputMangaka';
    $img = '$inputImg';
    $IDG = '7';*/

    $nom = $inputNom;
    $mangaka = $inputMangaka;
    $img = $inputImg;
    $IDG = $inputIDG;   
    $IDG = $inputIDG;
    
    $req = $dbh->prepare("INSERT INTO manga (nom, mangaka, img, IDG) VALUES ('".$nom."', '".$mangaka."', '".$img."', '".$IDG."')");
    
    $req->execute(array(
        "nom" => $nom, 
        "mangaka" => $mangaka,
        "img" => $img,
        "IDG" => $IDG
    ));
    $data = $req->fetchAll();
    

}
function updateManga($dbh, $id, $inputNom, $inputMangaka, $inputImg, $inputIDG){
  
/*    $nom = '$inputNom';
    $mangaka = '$inputMangaka';
    $img = '$inputImg';
    $IDG = '7';*/
    $nom = $inputNom;
    $mangaka = $inputMangaka;
    $img = $inputImg;
    $IDG = $inputIDG;   
    $IDG = $inputIDG;
    
    $req = $dbh->prepare("UPDATE manga SET nom = '".$nom."', mangaka = '".$mangaka."', img = '".$img."', IDG = '".$IDG."' WHERE id =". $id );
    
    $data = $req->fetchAll();

}