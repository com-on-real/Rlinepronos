<script>
$(document).ready(function ()
{
    $('#loginerror').hide();
    $('#loginerrorinactif').hide();
    $('#loginsuccess').hide();

    $("#logindirect").click(function ()
    {
        var obj = 'window.location.replace("<?=RACINE?>premium.rlinepronos.fr")';
        setTimeout(obj,0); 
    });

    $("#loginbutton").click(function (e)
    {
        e.preventDefault();


        $.get(
            'controller/connection.php',

            {
                email: $("#loginmail").val(),
                mdp: $("#loginpassword").val(),
            },

            function (data)
            {  


                var nom = '<?= DOMAINE ?>';

                switch(nom)
                {
                    case "vitrine":
                        nom = 'premium';
                    break;

                    case "premium":
                        nom = 'premium';
                    break;

                    case "admin":
                        nom = 'admin';
                    break;
                }
                
                switch(data)
                {
                    case "Success":
                        $('#loginsuccess').toggle(400);


                        var obj = window.location.replace('<?=RACINE?>' + nom + '.rlinepronos.fr');
                        setTimeout(obj,800); 
                    break;

                    case "inactive":
                        $('#loginerror').hide();
                        $('#loginerrorinactif').toggle();
                    break;

                    case "error":
                        $('#loginerrorinactif').hide();
                        $('#loginerror').toggle(400);
                        $('#loginpassword').val('');
                    break;
                }
            },

        );
    });
});
</script>
