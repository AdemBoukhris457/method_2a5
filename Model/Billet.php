<?php

class billeterie {

private  $id_billet = null;
private  $email= null;
private  $cni= null;
private  $nombre= null;
private  $id_evenement= null;




function __construct( string $email ,string $cni,int $nombre,int $id_evenement){

$this->email=$email;
$this->cni=$cni;
$this->nombre=$nombre;
$this->id_evenement=$id_evenement;





}
function getid_event(): int
{
    return $this->id_evenement;
}
function getid_billet(): int{
return $this->id_billet;
}
function getemail(): string{
return $this->email;
}
function getcni(): string{
return $this->cni;
}
function getnombre(): int{
return $this->nombre;
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
    function setid_event(int $id_evenement): void
    {
        $this->id_evenement = $id_evenement;
    }




}
