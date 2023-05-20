let collection, boutonAjout, boutonEnregistrement, span;
    window.onload = () => {
        collection = document.querySelector("#player");
        span = collection.querySelector("span");

        collection.style = "text-align: center; width: 10px; "
        collection.style.display = ""
 
        boutonAjout = document.createElement("button");

        boutonAjout.className = "ajout-player btn btn-outline-primary";
        boutonAjout.innerText = "Add player";
        boutonAjout.style.marginTop = "10px";
        boutonAjout.style.display = "inline-block";
        
        let nouveauBouton = span.append(boutonAjout);

        collection.dataset.index = collection.querySelectorAll("input").length;
        boutonAjout.addEventListener("click", function(){
            addButton(collection, nouveauBouton);
        });
    }

    function addButton(collection, nouveauBouton)
    {
        // on recupère le prototype
        let prototype = collection.dataset.prototype;

        // On recupère l'index qui indique le nombre de sous-formulaires déjà ajoutés
        let index = collection.dataset.index;

        // ce prototype est sous forme de chaine de caractères
        prototype = prototype.replace(/__name__/g, index);

        // On recupère le prototype (nouveau formulaire) sous forme d'éléments HTML
        let content = document.createElement("html");
        content.innerHTML = prototype;

        let newForm = content.querySelector("div");

        // On contruit le bouton de suppression
        let boutonSuppr = document.createElement("button");

        boutonSuppr.type = "button";
        boutonSuppr.className = "col-md-4";
        boutonSuppr.className = "btn btn-outline-danger";
        boutonSuppr.id = "delete-player-" + index;
        boutonSuppr.innerText = "Delete player";
        boutonSuppr.style.marginTop = "10px";
        boutonSuppr.style.marginBottom= "20px";
        boutonSuppr.style.display = "inline-block";

        // On ajoute le bouton de suppression au nouveau formulaire
        newForm.append(boutonSuppr);

        // putIntoDivRow(boutonSuppr, 'col-md-6');
        // putIntoDivRow(boutonSuppr.parentElement, 'row');

        collection.dataset.index++;
        
        let boutonAjout = collection.querySelector(".ajout-player");

        span.insertBefore(newForm, boutonAjout);
        
        boutonSuppr.addEventListener("click", function(){
            this.previousElementSibling.parentElement.remove();
        })

    }

    // fonction qui crée un div.row et lui ajoute un élément
    function putIntoDivRow(element, divClass)
    {
        let div = document.createElement('div');
        div.classList.add(divClass);
        element.before(div);
        div.append(element);
    }
