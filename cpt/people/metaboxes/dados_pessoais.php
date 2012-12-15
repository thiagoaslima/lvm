<?php

    nome();
    
    function nome () {
        $args = [
            "name" => "lvm_people_nome",
            "label" => "Nome",
            "labelClass" => "",
            "class" => "",
            "placeholder" => "Digite seu primeiro nome ex.: João Paulo"
        ];
        camposFormulario("text", $args);
    }

?>