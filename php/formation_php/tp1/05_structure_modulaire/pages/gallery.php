<h2>Gallery</h2>

<p>
    Le système de combat est basé sur l'acquisition du meilleur équipement possible (arme, boucliers, accessoires), possédant des crans pour stocker un certain nombre de matérias. 
    Mais là où l'évolution est la plus importante, c'est sur le nouveau système de matérias (des boules condensées d'énergie mako) qui permettent de lancer différents sorts 
    (de soutient, d'attaque, d'invocation...). Un système particulièrement génial, puisque vous pouvez associer différentes matérias entre elles 
    (afin de jeter un sort sur plusieurs monstres d'un coup par exemple...). Quant aux chimères, il suffit juste de les invoquer pour avoir accès à leur puissance. 
    Cela dit certaines sont cachées, et pour toutes les trouver vous aurez besoin d'avoir l'oeil bien aiguisé ! De même les dernières pièces d'équipement 
    et matérias sont cachées un peu partout, il faudra donc vous armer de patience ! Pour les boss optionnels de cet épisodes ils sont au nombre de deux, 
    l'arme Emeraude (sous l'eau) et l'arme Rubis (dans le désert), il vous faudra être bien préparé pour survivre !
</p>
<p>
    Les personnages de cet opus sont absolument géniaux. A commencer par Cloud un héros qui a totalement absorbé la personnalité de son ancien ami Zack. 
    Puis du terrible Sephiroth, le plus charismatique boss de tous les RPGs. Sans oublier le ténébreux Vincent, le machiavélique Hojo... 
    Le scénario de Final Fantasy 7 est un vrai bijou. L'histoire prend place dans la ville ultra moderne et surtout ultra polluée Midgar. 
    Cloud est alors en mission pour le groupe Avalanche, il doit faire sauter un générateur Shinra qui aspire l'énergie Mako de la planète. 
    Mais l'histoire va l'emmener bien plus loin que le conflit contre la Shinra...
</p>

<?php


$array_caracter_list = [
    ["./img_gallery/aeris2.jpg","Aeris" , "Je vais y aller maintenant, je reviendrai quand tous sera fini.","https://www.fffury.com/FF7-Personnages-Aeris.html" ],
    ["./img_gallery/barret.jpg","Barret", "Tu dois comprendre quelque chose ... Je n'ai pas de réponse. Je veux être avec Marlene ... mais je dois combattre. Parce que si je ne le fais pas ... la planète va mourir. Donc, je vais continuer à me battre !","https://www.fffury.com/FF7-Personnages-Barret.html"  ],
    ["./img_gallery/caitsith.jpg","Cait Sith","Il y a beaucoup de jouets en peluche comme mon corps, mais il n'y a qu'un seul moi !", "https://www.fffury.com/FF7-Personnages-CaitSith.html"],
    ["./img_gallery/cid.jpg","Cid","Posez votre cul sur cette chaise et buvez votre putain de thé.", "https://www.fffury.com/FF7-Personnages-Cid.html"],
    ["./img_gallery/youfi.jpg","Youfie", "Pour la gloire de Wutai", "https://www.fffury.com/FF7-Personnages-Youfie.html" ],
    ["./img_gallery/tiffa.jpg","Tiffa", "Je vous hais ! Je déteste la Shinra ! Je déteste le SOLDAT ! Je vous hais tous !", "https://www.fffury.com/FF7-Personnages-Tifa.html" ],
    ["./img_gallery/cloud.jpg","Cloud", "Aeris est partie, elle ne rira plus, ne pleurera plus, ni ne se mettra en colere... et cette douleur que je ressens ? Mes doigts picotent, ma bouche est sèche, mes yeux me brulen", "https://www.fffury.com/FF7-Personnages-Cloud.html"],
    ["./img_gallery/vincent.jpg","Vincent", "Ce fut mon péché, et cela... c'est ma punition.", "https://www.fffury.com/FF7-Personnages-Vincent.html"],
    ["./img_gallery/sephiroth.jpg","Sephiroth", "Je suis celui l’élu. J'ai été choisi pour gouverner cette planète.", "https://www.fffury.com/FF7-Personnages-Sephiroth.html"],
    ["./img_gallery/rouge.jpg","Red XIII", "Hojo m'a appelé Rouge XIII. Un nom qui n'a aucun sens pour moi.", "https://www.fffury.com/FF7-Personnages-Nanaki.html"]
];

?>

<section id="gallery" class="row">

    <?php foreach($array_caracter_list as $src ): ?>
            <article class="col-12 col-sm-6 col-md-4 mb-3">
                <div class="card" >
                    <img src="<?php echo $src[0]?>" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $src[1] ?></h5>
                        <p class="card-text">Citation : <?php echo $src[2] ?></p>
                        <a href="<?php echo $src[3] ?>" class="btn btn-primary">Read more...</a>
                    </div>
                </div>
            </article>
    <?php endforeach; ?>
</section>
<!--
<?php
$dir = "./img_gallery/img_complet/"; // on définie le chemin du dossier images choisies
$array_img = scandir($dir); 
var_dump($array_img);
?> -->
<!--
<section id="gallery" class="row">
    <?php foreach($array_img as $src ): // on boucle sur le tableau de src
        $file = $dir.$src; // on definit le 
        if (is_file($file)): // ici on vérifie que le chemin existe et si oui il fait la suite du traitement

        ?>
            <article class="col-12 col-sm-6 col-md-4 mb-3">
                <div class="card" >
                    <img src="<?php echo $dir.$src?>" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo "hehe" ?></h5>
                        <p class="card-text">Citation : <?php echo "hoho" ?></p>
                        <a href="#" class="btn btn-primary">Read more...</a>
                    </div>
                </div>
            </article>
        <?php endif ?>
    <?php endforeach?>
</section> 
-->


<!--
    <article class="col-12 col-sm-6 col-md-4 mb-3">
        <div class="card" >
            <img src="./img_gallery/youfi.jpg" class="card-img-top" alt="bibi FF9">
            <div class="card-body">
                <h5 class="card-title">Youfi</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Read more...</a>
            </div>
        </div>
    </article>
    <article class="col-12 col-sm-6 col-md-4 mb-3">
        <div class="card" >
            <img src="./img_gallery/tiffa.jpg" class="card-img-top" alt="Tifa FF7">
            <div class="card-body">
                <h5 class="card-title">Tiffa</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Read more...</a>
            </div>
        </div>
    </article>
    <article class="col-12 col-sm-6 col-md-4 mb-3">
        <div class="card">
            <img src="./img_gallery/cloud.jpg" class="card-img-top" alt="Cloud FF7">
            <div class="card-body">
                <h5 class="card-title">Cloud</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Read more...</a>
            </div>
        </div>
    </article>
    <article class="col-12 col-sm-6 col-md-4 mb-3">
        <div class="card" > 
            <img src="./img_gallery/vincent.jpg" class="card-img-top" alt="bibi FF9">
            <div class="card-body">
                <h5 class="card-title">Vincent</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Read more...</a>
            </div>
        </div>
    </article>
    <article class="col-12 col-sm-6 col-md-4 mb-3">
        <div class="card" >
            <img src="./img_gallery/sephiroth.jpg" class="card-img-top" alt="Tifa FF7">
            <div class="card-body">
                <h5 class="card-title">Sephiroth</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Read more...</a>
            </div>
        </div>
    </article>
    <article class="col-12 col-sm-6 col-md-4 mb-3">
        <div class="card">
            <img src="./img_gallery/rouge.jpg" class="card-img-top" alt="Cloud FF7">
            <div class="card-body">
                <h5 class="card-title">Red XIII</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Read more...</a>
            </div>
        </div>
    </article>-->
