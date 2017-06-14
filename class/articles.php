<?php

class Articles implements JsonSerializable {
    private $utilisateur;
    private $titre;
    private $article;
    private $date;
    private $heure;
    private $newdate;
    private $newheure;
    public function __construct($utilisateur, $titre, $article, $date, $heure) {
        $this->utilisateur = $utilisateur;
        $this->titre = $titre;
        $this->article = $article;
        $this->date = $date;
        $this->heure = $heure;
        $this->newdate = date("d-m-Y");
        $this->newheure = date("H:i:s");
    }

    public function jsonSerialize() {
        return [
            "utilisateur" => $this->utilisateur,
            "titre" => $this->titre,
            "article" => $this->article,
            "date" => $this->date,
            "heure" => $this->heure,
            "newdate" => $this->newdate,
            "newheure" => $this->newheure
        ];
    }

}