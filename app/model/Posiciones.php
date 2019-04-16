<?php 

class Posiciones extends ModeloBase{
    private $idPosiciones;
    private $idEquipo;
    private $idTorneo;
    private $golesFavor;
    private $golesContra;
    private $puntaje;
    private $partidosJugados;
    private $partidosEmpatados;
    private $partidosPerdidos;

    public function __construct() {

    }
    

    /**
     * Get the value of idPosiciones
     */ 
    public function getIdPosiciones()
    {
        return $this->idPosiciones;
    }

    /**
     * Set the value of idPosiciones
     *
     * @return  self
     */ 
    public function setIdPosiciones($idPosiciones)
    {
        $this->idPosiciones = $idPosiciones;

        return $this;
    }

    /**
     * Get the value of idEquipo
     */ 
    public function getIdEquipo()
    {
        return $this->idEquipo;
    }

    /**
     * Set the value of idEquipo
     *
     * @return  self
     */ 
    public function setIdEquipo($idEquipo)
    {
        $this->idEquipo = $idEquipo;

        return $this;
    }

    /**
     * Get the value of idTorneo
     */ 
    public function getIdTorneo()
    {
        return $this->idTorneo;
    }

    /**
     * Set the value of idTorneo
     *
     * @return  self
     */ 
    public function setIdTorneo($idTorneo)
    {
        $this->idTorneo = $idTorneo;

        return $this;
    }

    /**
     * Get the value of golesFavor
     */ 
    public function getGolesFavor()
    {
        return $this->golesFavor;
    }

    /**
     * Set the value of golesFavor
     *
     * @return  self
     */ 
    public function setGolesFavor($golesFavor)
    {
        $this->golesFavor = $golesFavor;

        return $this;
    }

    /**
     * Get the value of golesContra
     */ 
    public function getGolesContra()
    {
        return $this->golesContra;
    }

    /**
     * Set the value of golesContra
     *
     * @return  self
     */ 
    public function setGolesContra($golesContra)
    {
        $this->golesContra = $golesContra;

        return $this;
    }

    /**
     * Get the value of puntaje
     */ 
    public function getPuntaje()
    {
        return $this->puntaje;
    }

    /**
     * Set the value of puntaje
     *
     * @return  self
     */ 
    public function setPuntaje($puntaje)
    {
        $this->puntaje = $puntaje;

        return $this;
    }

    /**
     * Get the value of partidosJugados
     */ 
    public function getPartidosJugados()
    {
        return $this->partidosJugados;
    }

    /**
     * Set the value of partidosJugados
     *
     * @return  self
     */ 
    public function setPartidosJugados($partidosJugados)
    {
        $this->partidosJugados = $partidosJugados;

        return $this;
    }

    /**
     * Get the value of partidosEmpatados
     */ 
    public function getPartidosEmpatados()
    {
        return $this->partidosEmpatados;
    }

    /**
     * Set the value of partidosEmpatados
     *
     * @return  self
     */ 
    public function setPartidosEmpatados($partidosEmpatados)
    {
        $this->partidosEmpatados = $partidosEmpatados;

        return $this;
    }

    /**
     * Get the value of partidosPerdidos
     */ 
    public function getPartidosPerdidos()
    {
        return $this->partidosPerdidos;
    }

    /**
     * Set the value of partidosPerdidos
     *
     * @return  self
     */ 
    public function setPartidosPerdidos($partidosPerdidos)
    {
        $this->partidosPerdidos = $partidosPerdidos;

        return $this;
    }
}