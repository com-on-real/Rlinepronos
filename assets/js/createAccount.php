<script>


$(document).ready(function ()
{
    hideErreur();
    function hideErreur()
    {
        $('#errorEmpty').hide();
        $('#errorAlreadyExistMail').hide();
        $('#errorAlreadyExistPseudo').hide();
        $('#errorConditions').hide();
        $('#errorInvalidMail').hide();
        $('#success').hide();
    }



$("#registerbutton").click(function (e) {
    e.preventDefault();




    $.get(
        '/?ajax=create_account', // Un script PHP que l'on va créer juste après
        {
            firstname: $("#registerfirstname").val(), // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
            lastname: $("#registerlastname").val(),
            pseudo: $("#registerpseudo").val(),
            email: $("#registeremail").val(),
            password: $("#registerpassword").val(),
            checkbox: $("#registercheckbox").prop('checked')

        },

        function (data) {

            hideErreur();

            switch(data)
            {
                case 'errorEmpty':
                    $('#errorEmpty').show(400);
                break;

                case 'errorAlreadyExistMail':
                    $('#errorAlreadyExistMail').show(400);
                break;

                case 'errorAlreadyExistPseudo':
                    $('#errorAlreadyExist').show(400);
                break;

                case 'errorConditions':
                    $('#errorConditions').show(400);
                break;

                case 'errorInvalidMail':
                    $('#errorInvalidMail').show(400);
                break;

                case 'errorConditions':
                    $('#errorConditions').show(400);
                break;

                case 'success':
                    $('#success').show(400);

                    var obj = window.location.replace('<?=RACINE?>premium.rlinepronos.fr');
                    setTimeout(obj,4000); 
                break;

                
            }

        },

    );
});
});

</script>