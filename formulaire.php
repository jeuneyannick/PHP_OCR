<p>On insérera ici les éléments de notre formulaire</p>

<p> Cette page ne contient que du HTML.<br />
    Veuillez taper votre prénom:  
</p>



<form method="post" action="cible.php">
    <p>
        <input type="text" name="prenom" />
        <input type="submit" value="Valider" />
        <!-- rows et cols permettent de définir la taille de la zone de texte en hauteur et en largeur respectivement !-->
        <textarea name="message" rows="8" cols="45">
            Votre message ici
        </textarea>
        <!-- La liste déroulante!-->
        <select name="choix">
            <option value="choix1">Choix 1</option>
            <option value="choix2">Choix 2</option>
            <option value="choix3">Choix 3</option>
            <option value="choix4">Choix 4</option>
        </select>
        <!-- Les cases à cocher !-->
        <input type="checkbox" name="case" id="frites" />
        <label for="case">Frites </label>
        <input type="checkbox" name="frites" id="steack" />
        <label for="case">Steack Haché </label>
        <input type="checkbox" name="epinards" id="epinards" />
        <label for="case">Epinards </label>
        <input type="checkbox" name="huitres" id="huitres" />
        <label for="case">Huitres </label>

        <!--Les boutons d'option!-->
        Aimez-vous les frites ? 
        <input type="radio" name="frites" value="oui" id="oui" checked= "checked">
        <label for="oui">Oui</label>
        <input type="radio" name="frites" value="non" id="non" />
        <label for="non">Non</label>
        <!-- les champs cachés !-->
        <input type ="hidden" name="pseudo" value="Mateo21" />
    </p>

</form>