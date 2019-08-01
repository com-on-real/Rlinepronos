<!-- Connection Espace VIP-->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalVIP">Se Connecter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <!-- Message erreur -->
          <div class="alert alert-danger" id="loginerror" role="alert">
            Erreur: Identifiant ou mot de passe incorrect.
          </div>
          <div class="alert alert-warning" id="loginerrorinactif" role="alert">
              Merci d'activer votre compte via le lien reçu par email avant de vous connecter.
          </div>
          <div class="alert alert-success" id="loginsuccess" role="alert">
              Connexion en cours !
          </div>

        <!-- Formaulaire -->
        <form>
          <div class="form-group">
            <input type="email" class="form-control" id="loginmail" aria-describedby="emailHelp" placeholder="Adresse E-Mail" value="">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="loginpassword" placeholder="Mot de Passe">
          </div>
          <button id="loginbutton" class="btn btn-warning btn-lg ">Connection</button>

          <button class="btn btn-neutral" data-toggle="modal" data-dismiss="modal" data-target="#forget"><i class="now-ui-icons objects_key-25"></i> Mot de passe oublié</button>
        </form>


      </div>
    </div>
  </div>
</div>


<!-- Inscription -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="inscription" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLogin">Inscription</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      
      <div class="modal-body">

        <!-- Message erreur -->
          <div class="alert alert-success" id="success" role="alert">
            votre compte a été créé avec succès ! Votre compte est desormais actif !
          </div>

          <div class="alert alert-warning" id="errorEmpty" role="alert">
            Vous n'avez pas rempli toutes vos informations dans le formulaire.
          </div>

          <div class="alert alert-warning" id="errorAlreadyExistMail" role="alert">
            Un  compte existe avec cet email. Si vous avez perdu votre mot de passe, vous pouvez utiliser la fonction <a data-toggle="modal" data-dismiss="modal" data-target="#forget" class="text-info">mot de passe oublié</a>.
          </div>

          <div class="alert alert-warning" id="errorAlreadyExistPseudo" role="alert">
            Un  compte existe avec ce pseudo. Merci d'en choisir un autre.
          </div>

          <div class="alert alert-warning" id="errorConditions" role="alert">
            Merci de lire et d'accepter les conditions.
          </div>

          <div class="alert alert-danger" id="errorInvalidMail" role="alert">
            L'adresse email que vous avez entré est invalide.
          </div>

          <!-- Formulaire -->
          <form class="form">
              <div class="input-group">
                
                <input type="text" class="form-control" placeholder="Prénom" id="registerfirstname" autocomplete="firstname">
              </div>

              <div class="input-group">
                <input type="text" class="form-control" placeholder="Nom" id="registerlastname" autocomplete="name">
              </div>

              <div class="input-group">
                <input type="text" class="form-control" placeholder="Pseudo" id="registerpseudo" autocomplete="pseudo">
              </div>

              <div class="input-group">
                
                <input type="email" class="form-control" placeholder="Votre mail" id="registeremail" autocomplete="email">
              </div>

              <div class="input-group">

                <input type="password" class="form-control" placeholder="Votre mot de passe" id="registerpassword" autocomplete="password">
              </div>

              <div class="modal-footer">
                  <div class="col-md-6">
                      <div class="form-check text-right">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" id="registercheckbox">
                        <span class="form-check-sign"></span>
                        Accepter les
                        <a <?= $CGV ?>>conditions</a>
                      </label>
                      </div>
                  </div>
                  <div class="col-md-6">
                    <a class="btn btn-warning btn-round text-center" id="registerbutton" >Creer mon compte</a>
                  </div>
              </div>
          </form>
          
      </div>
    </div>
  </div>
</div>

<!-- Mot de passe oublié -->
<div class="modal fade" id="forget" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalVIP">Mot de passe oublié</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <!-- Message erreur -->
        <div class="alert alert-danger" id="errorforgot" role="alert" hidden="true">
          Une erreur est survenue.
        </div>
        <div class="alert alert-success" id="okforgot" role="alert" hidden="true">
          Si vous disposez d'un compte, vous allez recevoir un email. 
        </div>

        <!-- Formulaire -->
        <div class="form-group">
          <input type="email" class="form-control" id="forgotemail" placeholder="Email">
          <button id="forgotbutton" class="btn btn-primary">Valider</button>
        </div>


      </div>
    </div>
  </div>
</div>
