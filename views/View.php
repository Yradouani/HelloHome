<?php

class View
{
    private $fichier;
    private $titre;

    public function __construct($action)
    {
        $this->fichier = "views/View" . $action . ".php";
    }

    // Génère et affiche la vue
    public function generer($donnees)
    {
        // Génération de la partie spécifique de la vue
        $contenu = $this->genererFichier($this->fichier, $donnees);
        // Génération du gabarit commun utilisant la partie spécifique
        $vue = $this->genererFichier(
            'views/gabarit.php',
            array('titre' => $this->titre, 'contenu' => $contenu)
        );
        // Renvoi de la vue au navigateur
        echo $vue;
    }

    // Génère un fichier vue et renvoie le résultat produit
    private function genererFichier($fichier, $donnees)
    {
        if (file_exists($fichier)) {
            // Rend les éléments du tableau $donnees accessibles dans la vue
            extract($donnees);
            ob_start();
            require $fichier;
            return ob_get_clean();
        } else {
            throw new Exception("Fichier '$fichier' introuvable");
        }
    }
}
