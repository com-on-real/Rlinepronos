<?php

$title="Connection - Admin"; 

$navbar = array('Methode' => '#methode');

$footer = 'false';


ob_start();

?>
<div class="container">
    <div class="col-md-4 col-sm-6 ml-auto mr-auto">
        <form class="form">
            <div class="card card-login">
                <div class="card-header ">
                    <h3 class="header text-center">RlinePronos</h3>
                </div>
                <div class="card-body ">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Adresse email</label>
                            <input type="email" id="loginmail" placeholder="Entrer email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Mot de passe</label>
                            <input type="password" id="loginpassword" placeholder="mot de passe" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="card-footer ml-auto mr-auto">
                    <button type="submit" class="btn btn-warning btn-wd" id="loginbutton">Se connecter</button>
                </div>
            </div>
        </form>
    </div>        
</div>

<script>
$(document).ready(function ()
{
    $("#loginbutton").click(function (e)
    {
        e.preventDefault();


        $.get(
            'controller/login_script.php', // Un script PHP que l'on va créer juste après
            {
                email: $("#loginmail").val(), // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
                mdp: $("#loginpassword").val(),

            },

            function (data)
            {

                if (data == "Success") 
                {
                    // Le membre est connecté. Ajoutons lui un message dans la page HTML.

                    //  window.location.replace('');
                    var email = $("#loginmail").val()
                    var mdp = $("#loginpassword").val()
                    var obj = 'window.location.replace("?domaine=admin");';  //?email='+ email +'&mdp='+ mdp +'&r=yes"
                    setTimeout(obj,0); 
                }
                else if (data == 'inactive') {
                    document.getElementById('loginerror').hidden = true;
                    document.getElementById('loginerrorinactif').hidden = false;
                } 
                else
                {
                    // Le membre n'a pas été connecté. (data vaut ici "failed")
                    document.getElementById('loginerrorinactif').hidden = true;
                        document.getElementById('loginerror').hidden = false;
                        var email = $("#loginmail").val()
                    var mdp = $("#loginpassword").val()
                    var obj = 'window.location.replace("?email='+ email +'&mdp='+ mdp +'&r=yes");'; 
                    setTimeout(obj,0); 
                }

            },

        );
    });
});
</script>

<?php $content = ob_get_clean();?>