<?php

class Articles implements JsonSerializable {
    private $utilisateur;
    private $avatar;
    private $titre;
    private $article;
    private $date;
    private $heure;
    private $newdate;
    private $newheure;
    public function __construct($utilisateur, $avatar, $titre, $article, $date, $heure) {
        $this->utilisateur = $utilisateur;
        $this->avatar = $avatar;
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
            "avatar" => $this->avatar,
            "titre" => $this->titre,
            "article" => $this->article,
            "date" => $this->date,
            "heure" => $this->heure,
            "newdate" => $this->newdate,
            "newheure" => $this->newheure
        ];
    }

}