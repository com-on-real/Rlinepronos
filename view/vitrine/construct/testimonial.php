      <!--     *********    Temoignage     *********      -->
<div class="testimonials-1 section-image" style="background-image: url('assets/img/background/main.jpg')"  id="temoignage">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="title">Temoignage de VIP</h2>
              <h4 class="description "></h4>
            </div>
          </div>
          <div class="row">

          <?php
        $datas = $database->select("opinions", [
          "[><]users" => ["id_user" => "id"]], 
          ["content", "pseudo"]);
foreach($datas as $data){
    echo '
    <div class="col-md-4">
    <div class="card card-testimonial">
      <div class="card-avatar">
        <a href="#pablo">
          <img class="img img-raised" src="assets/img/profile/homme.png" />
        </a>
      </div>
      <div class="card-body">
        <p class="card-description">
         '.$data["content"].'
        </p>
      </div>
      <div class="icon icon-primary">
        <i class="fa fa-quote-right"></i>
      </div>
      <div class="card-footer">
        <h4 class="card-title">'.$data["pseudo"].'</h4>
      </div>
    </div>
  </div>
';};
?>
          </div>
        </div>
      </div>
      <?php
}
?>