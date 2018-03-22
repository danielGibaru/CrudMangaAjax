<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <?php require "core/data.php"; ?>
    <?php require "core/requete.php"; ?>

</head>
<body>
    
    <div>
        <a class="edit">O</a>
        <div id="a"></div>
        <div id="AAAAA"></div>
        <script type="text/javascript" language="javascript">
            $().ready(function() {
                $('.nomM').click(function() {
                    $id = $('p', this).attr('class');
                    $.ajax({
                        url: "core/requete.php",
                        method: 'POST',
                        datatype: 'html',
                        data: {
                            getMangaById: 'getMangaById',
                            id: $id
                        },
                        success: function(data) {
                            $("form").html(data);
                            $IDG = 0;
                        },
                        error: function(data) {
                            console.log(data);
                        }

                    });
                });
                $('a').click(function() {
                    $IDG = $('p', this).attr('class');
                    $.ajax({
                        url: "core/requete.php",
                        method: 'POST',
                        datatype: 'html',
                        data: {
                            getMangaByIDG: 'getMangaByIDG',
                            idg: $IDG
                        },
                        success: function(data) {
                            $("#manga").html(data);
                            $IDG = 0;
                        },
                        error: function(data) {
                            console.log(data);
                        }

                    });
                });
                $('#tlg').click(function() {

                    $.ajax({
                        url: "core/requete.php",
                        method: 'POST',
                        datatype: 'html',
                        data: {
                            getManga: 'getManga',

                        },
                        success: function(data) {
                            $("#manga").html(data);
                        },
                        error: function(data) {
                            console.log(data);
                        }

                    });
                });
                $('#add').click(function() {

                    $.ajax({
                        url: "core/requete.php",
                        method: 'POST',
                        datatype: 'html',
                        data: {
                            addManga: 'addManga',
                            inputNom: $('#inputNom').val(), 
                            inputMangaka: $('#inputMangaka').val(),
                            inputImg: $('#inputImg').val(),
                            inputIDG: $('#inputIDG').val()
                        },
                        success: function(data) {
                            
                            console.log(data);
                        },
                        error: function(data) {
                            console.log(data);
                        }

                    });
                });
                $("#edit").click(function(){
                    $id = $('p', this).attr('class');
                    $.ajax({
                        url: "core/requete.php",
                        method: 'POST',
                        datatype: 'html',
                        data: {
                            updateManga: 'updateManga',
                            id: $id,
                            inputNom: $('#inputNom').val(), 
                            inputMangaka: $('#inputMangaka').val(),
                            inputImg: $('#inputImg').val(),
                            inputIDG: $('#inputIDG').val()
                        },
                        success: function(data) {
                            $("#a").html(data);
                        },
                        error: function(data) {
                            console.log(data);
                        }

                    });
                });
                
            });

        </script>
        <script type="text/javascript" language="javascript"> 

            function deleteManga(id) {
                    $.ajax({
                        url: "core/requete.php",
                        method: 'POST',
                        datatype: 'html',
                        data: {
                            deleteMangaById: 'deleteMangaById',
                            id: id
                        },
                        success: function(data) {
                            console.log(data);
                            //var datas = data;
                            //alert(data);
                            $("#manga").html(data);
                        },

                        error: function(data) {
                            console.log(data);
                        }
                    });               
                }

            </script>
        <div class="container">
            <div class="row">
                <div class="col">
                    
                    <?php getGenre($dbh);?>
                    <button id="tlg" type="button" class="btn btn-secondary">Tout les genres</button>
                </div>
            </div>
        </div>
    </div>
    <div id="manga"></div>
   

        <button id="myBtn" class="btn btn-success">+</button>
        <div id="myModal" class="modal">
          <div class="modal-content">
            <span class="close">&times;</span>
            <?php getMangaNom($dbh);?>
              <form>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputNom">nom</label>
                      <input type="nom" class="form-control" id="inputNom" placeholder="Nom">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputMangaka">mangaka</label>
                      <input type="mangaka" class="form-control" id="inputMangaka">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputImg">img</label>
                    <input type="text" class="form-control" id="inputImg">
                  </div>
                  <div class="form-group">
                    <label for="inputIDG">IDG</label>
                    <input type="text" class="form-control" id="inputIDG">
                  </div>

                  <button id="add" type="button" class="btn btn-primary">envoyer</button>
                </form>
          </div>

        </div>

        <script>
            var modal = document.getElementById('myModal');
            var btn = document.getElementById("myBtn");
            var span = document.getElementsByClassName("close")[0];
            btn.onclick = function() {
                modal.style.display = "block";
            }
            span.onclick = function() {
                modal.style.display = "none";
            }
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
       
        <div id="myModalEdit" class="modal">

        </div>

        <script type="text/javascript" language="javascript">


        </script>
    </div>
</body>

</html>
