<div class="testimonials-2" id="paris">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
          <h2 class="title text-center">Mes derniers paris</h2>
            <div id="carouselExampleIndicators2" class="carousel slide">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>                
                </ol>
                <div class="carousel-inner" role="listbox">

                <?php
                $active = 'active';
                // $allPronos = $db->select("pronos", 'id_pronos');
                
                foreach($stat['pronos']['all_id_pronos'] as $pronos):

                    $equipe = infoPronos($pronos)['equipe'];
                    $pronos = infoPronos($pronos)['info'];

                    $title_pronos = $pronos['resultat']['title'];
                    if($title_pronos !== "wait_match" && $title_pronos !== "wait_validation"):

                      $pronos['resultat']['title'] == 'Defaite' ? $color = 'primary' : $color = 'success';
                ?>

                  <div class="carousel-item <?= $active ?> justify-content-center">

                     <div class="col-md-10 ml-auto mr-auto">
                      <div class="card">
                        <div class="card-body">
                          <div class="text-center">
                            <h3 class="text-right text-<?= $color ?>"><?= $pronos['resultat']['title'] ?></h3>
                          </div>

                          <blockquote class="blockquote">
                              <div class="text-center">
                                    <?php foreach ($equipe as $v):?>
                                      <p>Match entre <b><?= $v['team1']['name'] ?></b> et <b><?= $v['team2']['name'] ?></b></p>
                                    <?php endforeach;?>
                              </div>
          
                              <ul class="list-group list-group-flush">
                                  <li class="list-group-item">
                                      <b class="text-warning">Choix :</b> 
                                      <?= $pronos['content'] ?>
                                  </li>
                                  <li class="list-group-item">
                                      <div class="row">
                                          <div class="col-md-6">
                                              <b class="text-warning">Fiabilité :</b>
                                              <span class="badge badge-info"><?= $pronos['reliability'] ?></span> <br />
                                          </div>
                                          <div class="col-md-6">
                                              <b class="text-warning">Cote total :</b>
                                              <span class="badge badge-info"><?= $pronos['cote_total'] ?></span> <br />
                                          </div>
                                      </div>
                                    </li>
                              </ul>
                          </blockquote>
                        <p class="blockquote-footer text-right"><?= $pronos['type'] ?></p>

                      </div>
                    </div>
                  </div>
                </div>

                <?php
                unset($active);
                    endif;
                endforeach;
                ?>

          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
            <i class="now-ui-icons arrows-1_minimal-left"></i>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
            <i class="now-ui-icons arrows-1_minimal-right"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>













