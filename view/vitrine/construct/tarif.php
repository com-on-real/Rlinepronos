<div class="pricing-1 section-image" id="tarifs" style="background-image: url('assets/img/background/argent.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ml-auto mr-auto text-center">
              <h2 class="title">Tarif des abonnements</h2>
              <h4 class="description "></h4>
              <div class="section-space"></div>
            </div>
        </div>
        <div class="row">

<?php foreach ($stat['economy']['offers'] as $offer): ?>

            <div class="col-lg-2 col-md-4 col-12 mx-auto">
                <h5 class="title text-center text-warning" style="min-height: min-content"></h5>
                <div class="card card-pricing card-plain">
                    <div class="card-body">
                    
                    <h5 class="category "><br/><?= $offer['title'] ?></h5>
                    <h3 class="card-title"><?= $offer['price'] ?></h3>
                    <ul>
                        <li>Prono safe et fun chaque Week End</li>
                        <li>Acces au forum VIP</li>
                    </ul>
                    <a class="btn btn-info btn-round" data-toggle="modal" data-target="#inscription">Acheter</a>
                    </div>
                </div>
            </div>

<?php endforeach; ?>

        </div>
    </div>
</div>
