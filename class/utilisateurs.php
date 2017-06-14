<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Utilisateurs implements JsonSerializable {
    private $pseudo;
    private $mdp;
    private $mail;
    private $avatar;
    public function __construct($pseudo, $mdp, $mail, $avatar) {
        $this->pseudo = htmlspecialchars($pseudo);
        $this->mdp = md5($mdp);
        $this->mail = filter_var($mail, FILTER_VALIDATE_EMAIL);
        $this->avatar = $avatar;
        return json_encode($this);
    }
    
    public function jsonSerialize() {
        return [
            "pseudo" => $this->pseudo,
            "mdp" => $this->mdp,
            "mail" => $this->mail,
            "avatar" => $this->avatar
                
        ];
    }

}
