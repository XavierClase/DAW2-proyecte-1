<?php

    class Producte {

        const TYPE_MENJAR = 1;

        protected $nom;
        protected $descripcio;
        protected $preu;
        protected $categoria;
        protected $disponibilitat;
        protected $descompte;

        public function __construct() {
            
        }

        public function getNom()
        {
                return $this->nom;
        }

        public function setNom($nom)
        {
                $this->nom = $nom;

                return $this;
        }

        public function getDescripcio()
        {
                return $this->descripcio;
        }

        public function setDescripcio($descripcio)
        {
                $this->descripcio = $descripcio;

                return $this;
        }

        public function getPreu()
        {
                return $this->preu;
        }

        public function setPreu($preu)
        {
                $this->preu = $preu;

                return $this;
        }

        public function getCategoria()
        {
                return $this->categoria;
        }

        public function setCategoria($categoria)
        {
                $this->categoria = $categoria;

                return $this;
        }

        public function getDisponibilitat()
        {
                return $this->disponibilitat;
        }

        public function setDisponibilitat($disponibilitat)
        {
                $this->disponibilitat = $disponibilitat;

                return $this;
        }

        public function getDescompte()
        {
                return $this->descompte;
        }

        public function setDescompte($descompte)
        {
                $this->descompte = $descompte;

                return $this;
        }
    }

?>