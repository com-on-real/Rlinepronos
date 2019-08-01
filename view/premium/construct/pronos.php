<div class="container">
  <div class="row">
      <div class="col-md-12 text-center">
          <h2 class="title zone-vip">Derniers pronos</h2>
      </div>
  </div>
  
<script type="text/javascript" src="assets/js/jquery.countdown.js"></script>

<?php
      foreach($stat['pronos']['all_id_pronos'] as $v):

        

          $pronos = infoPronos($v)['info'];
          $equipe = infoPronos($v)['equipe'];

          $title_pronos = $pronos['resultat']['title'];

          if($title_pronos == "wait_match"):   
            
?>

<script type="text/javascript">
$(document).ready(function () {
    $("#id<?= $pronos['id']?>").countdown("<?= $pronos['date_last_match'] ?>", function(event) {

        var format = "%Hh %Mmin %S";
        if(event.offset.totalDays > 0) {
            format = "%-d jour%!d " + format.replace("%S", "");
        }
        if(event.offset.weeks > 0) {
            format = "%-w semaine%!w " + format.replace("%S", "");
        }
            $(this).text(
                event.strftime(format)
            );
    });
})
</script>

                     <div class="col-md-8 ml-auto mr-auto">
                      <div class="card">
                        <div class="card-body">
                          <div class="text-center">
                            
                            <h3 class="text-right">Match dans :  <span id="id<?= $pronos['id']?>"><-- COUTNDOWN ---></span> </h3>
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


                <?php
                endif;
                endforeach;
                ?>
    </div>
<!-- <script type="text/javascript">
$(document).ready(function () {
    $("#ct'.$data['id'].'").countdown("2019/03/13 21:00", function(event) {

        var format = "%Hh %Mmin %S";
        if(event.offset.totalDays > 0) {
            format = "%-d jour%!d " + format.replace("%S", "");
        }
        if(event.offset.weeks > 0) {
            format = "%-w semaine%!w " + format.replace("%S", "");
        }
            $(this).text(
                event.strftime(format)
            );
    });
})
</script> -->
