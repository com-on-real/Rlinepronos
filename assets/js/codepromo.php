<script>
$(document).ready(function()
{

    $("[data-id]").click(function()
    {
        // Information sur l'offres selectioné
        offers = $(this).data('id');
        title = $(this).data('title');
        firstPrice = $(this).data('price');

        lien = '/achat-offres-' + offers;

        $("#nameOffers").html(title);
        $("#lastPrice").html(firstPrice);

        $('#inputPromo').keyup(function()
        {
            console.log("Typing...");

            // Code promo rentrer par user
            promoCode = $('#inputPromo').val();

            $.get(
            '?ajax=codepromo', // Un script PHP que l'on va créer juste après
            {
                code: promoCode,
                offers : offers,
                // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
            },
            function (finalPrice)
            {
                // Pas de code promo appliqué
                if (finalPrice == firstPrice)
                {
                    $("#form-promo").removeClass("has-success"); // Enleve couleur verte
                    $("#form-promo").addClass("has-error"); // Rajouter couleur rouge
                    $("#codeExist").html(" - Code invalide"); // Precice invalide code
                    $("#lastPrice").html(firstPrice); // Remet le prix original

                }
                // Code promo appliqué
                else
                {
                    $("#form-promo").removeClass("has-error");
                    $("#form-promo").addClass("has-success");
                    $("#codeExist").html(" -  Code bon ");
                    $("#lastPrice").html(finalPrice);

                    // On change url de sortit
                    lien = '/achat-offres-' + offers + '-codepromotion-' + promoCode;

                }
                
            }
            )  
        });

        $("#redirectPayement").click(function()
        {
            window.location.replace(lien);
        });


    });
});
</script>
