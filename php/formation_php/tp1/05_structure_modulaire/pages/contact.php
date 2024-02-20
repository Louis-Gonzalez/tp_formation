<h2>Contact</h2>

<p>
    Ut velit mauris, egestas sed, gravida nec, ornare ut, mi. Aenean ut orci vel massa suscipit pulvinar. Nulla sollicitudin. 
    Fusce varius, ligula non tempus aliquam, nunc turpis ullamcorper nibh, in tempus sapien eros vitae ligula. 
    Pellentesque rhoncus nunc et augue. Integer id felis. Curabitur aliquet pellentesque diam. Integer quis metus vitae elit lobortis egestas. 
    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi vel erat non mauris convallis vehicula. Nulla et sapien. 
    Integer tortor tellus, aliquam faucibus, convallis id, congue eu, quam. Mauris ullamcorper felis vitae erat. Proin feugiat, 
    augue non elementum posuere, metus purus iaculis lectus, et tristique ligula justo vitae magna. 
</p>

<form class="row g-3">
    <div class="col-md-6">
        <label for="inputLastname" class="form-label">Lastname</label>
        <input type="text" class="form-control" id="inputLastname">
    </div>
    <div class="col-md-6">
        <label for="inputName" class="form-label">Name</label>
        <input type="text" class="form-control" id="inputName">
    </div>
    <div class="col-md-6">
        <label for="inputCity" class="form-label">City</label>
        <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="col-md-6">
        <label for="inputState" class="form-label">State</label>
        <?php 
        $state = [ // déclaration du tableau du menu déroulant
                "Auvergne-Rhône-Alpes",
                "Bourgogne-Franche-Comté",
                "Bretagne",
                "Centre-Val de Loire",
                "Corse",
                "Grand Est",
                "Hauts-de-France",
                "Ile-de-France",
                "Normandie",
                "Nouvelle-Aquitaine",
                "Occitanie",
                "Pays de la Loire",
                "Provence Alpes Côte d’Azur",
                "Guadeloupe",
                "Guyane",
                "Martinique",
                "Mayotte",
                "Réunion"
            ]
        ?>
        <select id="state" class="form-select"> <!-- création du menu deroulant--> 
            <option selected> Choose....</option> 
            <?php foreach($state as $value):?> <!-- choix de l'option via une boucle forech qui parcours le tableau --> 
                <option><?php echo $value ?></option> <!-- affichage de la value de l'option--> 
            <?php endforeach ?> <!-- attention penser à fermer la boucle foreach --> 
        </select>
    </div>
    
    <div class="col-12">
        <label for="inputEmail4" class="form-label">Email</label>
        <input type="email" class="form-control" id="inputEmail4">
    <div class="col-12 mb-4">
        <label for="inputMessage" class="form-label">Message</label>
        <textarea type="text" class="form-control" id="inputMessage"></textarea>
    </div>
        <div class="col-md-6">
            <div class="form-check mb-4" >
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    I am agree !
                </label>
            </div>
        </div>
    <div class="col-12 mb-4 ">
        <button type="submit" class="btn btn-primary">Send me</button>
    </div>
</form>