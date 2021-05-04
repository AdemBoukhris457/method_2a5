<?php

class billeterie {

private  $id_billet = null;
private  $nom = null;
private  $email= null;
private  $cni= null;
private  $id_event = null;
private  $nombre= null;




function __construct( string $nom,   string $email ,string $cni,string $nombre ,string $id_event ){

$this->nom=$nom;
$this->email=$email;
$this->cni=$cni;
$this->nombre=$nombre;
$this->id_event=$id_event;




}
function getid_billet(): int{
return $this->id_billet;
}
function getnom(): string{
return $this->nom;
}
function getemail(): string{
return $this->email;
}
function getcni(): string{
return $this->cni;
}
function getnombre(): string{
return $this->nombre;
}
function getid_event(){return $this->id_event;}
    function setnom(string $nom): void{
$this->nom=$nom;
}
function setemail(string $email): void{


$this->email;
}
function setcni(string $cni): void{
$this->cni;


}
function setnombre(string $nombre): void{
$this->nombre;
}


public function set_id_event($id_event)
		{
			$this->id_event = $id_event;
		}

}


?>