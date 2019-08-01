<?php
$title="RlinePronos - Admin"; 
ob_start();
?>

<!-- STAT -->
<div class="row">
    <div class="col-md-3 mx-auto">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-circle-09 text-warning"></i>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="numbers">
                            <p class="card-category">Abonnement VIP</p>
                            <h4 class="card-title"><?= $stat['user']['nb_vip'] ?></h4>
                        </div>
                        <div class="numbers">
                            <p class="card-category">Utilisateurs</p>
                            <h4 class="card-title"><?= $stat['user']['nb'] ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mx-auto">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-money-coins text-success"></i>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="numbers">
                            <p class="card-category">Chiffre d'affaire</p>
                            <h4 class="card-title"><?= $stat['economy']['CA'] ?></h4>
                        </div>
                        <div class="numbers">
                            <p class="card-category">Revenue</p>
                            <h4 class="card-title"><?= $stat['economy']['revenue'] ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mx-auto">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-bullet-list-67 text-danger"></i>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="numbers">
                            <p class="card-category">Pronos disponible</p>
                            <h4 class="card-title"><?= $stat['pronos']['nb_pronos'] ?></h4>
                        </div>
                        <div class="numbers">
                            <p class="card-category">Paris total</p>
                            <h4 class="card-title"><?= $stat['pronos']['nb'] ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mx-auto">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-chart-pie-36 text-primary"></i>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="numbers">
                            <p class="card-category">Taux de reussite</p>
                            <h4 class="card-title"><?= $stat['pronos']['win_rate']?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- PRONOSLIST -->
<div class="row">
    <div class="col-md-12">
        <div class="card bootstrap-table">
            <div class="card-header">
                <h3 class="card-title">Paris</h3>
            </div>
            <div class="card-body table-full-width">
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <table id="pronosTable" class="table">
                    <thead>
                        <th data-field="actions" class="td-actions text-right">Actions</th>
                        <th data-field="nom" data-sortable="true">Status</th>
                        <th data-field="pseudo">Texte du pronostique</th>
                        <th data-field="email" data-sortable="true">Cote</th>
                        <th data-field="dateInscription" data-sortable="true" class="text-center">Fiabilité</th>
                        <th data-field="subscribe" data-sortable="true" class="text-center">Date match</th>
                        <th data-field="renouvelement" data-sortable="true" class="text-center">Equipe</th>
                    </thead>
                    <tbody>
                        <?= $array_list_pronos ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- ADD PRONOS -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pronos</h3>
            </div>
            <div class="card-body">

                <div class="alert alert-success" role="alert" id="AddPronosSuccess">
                    Le Pronos a été ajouté avec succes.
                </div>
                <div class="row">

                        <button class="btn btn-sm btn btn-primary btn-link" type="button" data-toggle="modal" data-target="#windowTeam" data-toggle="tooltip" data-placement="top" title="Ajouter une equipe !">
                            <i class="nc-icon nc-simple-add"></i> Ajouter une equipe
                        </button>
                </div>
                <br/>
                <form>
                <!-- Model confrontation -->
                <div id="addpronos" hidden>
                  
                    <blockquote>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group has-label">
                                    <select id="team1" data-style="btn-default btn-outline"  required>
                                        <option value="" disabled selected>Equipe 1</td>
                                        <?php foreach ($id_team as $id): $v = nameTeam($id); ?>

                                            <option value="<?= $id ?>"><?= $v['name'] ?></td>

                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group has-label">
                                    <select id="team2" data-style="btn-default btn-outline" required>
                                        <option value="" disabled selected>Equipe 2</td>
                                        <?php foreach ($id_team as $id): $v = nameTeam($id); ?>

                                            <option value="<?= $id ?>"><?= $v['name'] ?></td>

                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group has-label">
                                    <label>Cote</label>
                                    <input class="form-control" type="number" id="cote" min="0" required/>
                                </div>
                            </div>
                            <div class="col-md-6  col-sm-6">
                                <div class="form-group has-label">
                                    <label>Date</label>
                                    <input type="date" class="form-control" id="date" required/>
                                    <label>Heure</label>
                                    <input type="time" class="form-control" id="time" required/>
                                </div>
                            </div>
                        </div>
                    </blockquote>
                    
                </div>

                <button class="btn btn-link" id="combiner">
                    <i class="nc-icon nc-simple-add"></i>
                    Combiner
                </button> 
                <hr>
                <div class="row mt-2">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="pronosText">Texte du pronos</label>
                            <textarea class="form-control" id="pronosText" rows="10" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <select data-style="btn-default btn-outline" required id="pronosType">
                          <label>Type de pronos</label>
                          <option value="1" selected>Safe</td>
                          <option value="2">Fun</td>
                      </select>
                        <label>Fiabilité (%)</label>
                        <input class="form-control" type="number" id="reliability" min="0" max="100" required/>
                    </div>
                </div>          
            
            <div class="card-footer text-right">
                <button class="btn btn-info btn-fill pull-right" id="btnAddPronos">Ajouter ce pronostique</button>
                <div class="clearfix"></div>
            </div>
        </form>
        </div>
        </div>
    </div>
</div>

<!-- ADD TEAM -->
<div class="modal fade" id="windowTeam" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>

      <div class="modal-body">

      <div class="form-group has-label">
          <label>Ajouter une equipe</label>
          <input class="form-control" type="text" required="true" id="inputNameTeam" />
      </div>
      <button type="submit" class="btn btn-info btn-fill pull-right" id="buttonAddTeam">Ajouter</button>

          <div class="card-body table-full-width">
              <div class="row">
                  <div class="col-md-12">
                      <table id="teamTable" class="table">
                          <thead>
                              <th data-field="nom">Nom</th>
                          </thead>
                          <tbody>

                              <?= $array_list_team ?>
                              
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
    </div>

  </div>
</div>

<!-- USER LIST -->
<div class="row">
    <div class="col-md-12">
        <div class="card bootstrap-table">
            <div class="card-header">
                <h3 class="card-title">Utilisateurs</h3>
            </div>
            <div class="card-body table-full-width">
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <table id="userTable" class="table text-center">
                    <thead>
                        <tr class="text-center">
                            <th data-field="actions" class="td-actions text-right">Actions</th>
                            <th data-field="nom" data-sortable="true">Prenom et nom</th>
                            <th data-field="pseudo" data-sortable="true">Pseudo</th>
                            <th data-field="email" data-sortable="true">Email</th>
                            <th data-field="dateInscription" data-sortable="true">Inscription</th>
                            <th data-field="subscribe" data-sortable="true">Abonnement restant</th>
                            <th data-field="renouvelement" data-sortable="true">Renouvelement</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                    
                        <?= $array_list_user ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();?>