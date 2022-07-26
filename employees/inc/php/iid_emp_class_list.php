<?php
    class IddEmpOptionsList{
        function __construct(){
            $this->type = ['Socia', 'Socio', 'Administrativo'];

        }
        public function getType(){
            return $this->type;
        }
    }
?>