<?php

grupo(
    false,
    "lattes"
);

grupo( 
    false, 
    "primeironome",
    "nomesdomeio",
    "ultimonome",
    "citacao"
);

grupo(
    true,
    "sexo",
    "nascimento"
);


function lattes() {
    $args = [
        "id"          => '',
        "name"        => 'lvm_people_lattes',
        "label"       => 'Currículo Lattes',
        "labelClass"  => '',
        "class"       => '',
        "placeholder" => 'http://',
        "attributes"  => '',
        "obs"         => ''
    ];
    camposFormulario("url", $args);
}

function primeironome () {
    $args = [
        "id"          => '',
        "name"        => 'lvm_people_primeironome',
        "label"       => 'Primeiro nome',
        "labelClass"  => '',
        "class"       => 'required',
        "placeholder" => 'Preencha o campo com seu primeiro nome',
        "attributes"  => 'required',
        "obs"         => 'Ex.: Em <i>João Carlos da Silva Souza</i>, pode-se preencher o campo com João Carlos (caso a pessoa queira ser chamada de João Carlos) ou "João" (caso prefira apenas João).'
    ];
    camposFormulario("text", $args);
}

function nomesdomeio () {
    $args = [
       "id"          => "",
       "name"        => "lvm_people_nomedomeio",
       "label"       => "Nome(s) do meio",
       "labelClass"  => "",
       "class"       => "",
       "placeholder" => "Preencha o campo com seu(s) nome(s) do meio",
       "attributes"  => "",
       "obs"         => "Ex.: Em <i>João Carlos da Silva Souza</i>, pode-se preencher o campo com \"da Silva\" (caso a pessoa queira ser chamada de João Carlos) ou \"Carlos da Silva\" (caso prefira apenas João)."
   ];
   camposFormulario("text", $args);
}

function ultimonome () {
    $args = [
        "id"          => '',
        "name"        => 'lvm_people_ultimonome',
        "label"       => 'Último sobrenome',
        "labelClass"  => '',
        "class"       => 'required',
        "placeholder" => 'Preencha o campo com seu sobrenome',
        "attributes"  => 'required',
        "obs"         => 'Ex.: Em <i>João Carlos da Silva Souza</i>, pode-se preencher o campo com "da Silva Souza" (por motivos diversos) ou "Souza" (caso prefira apenas João Souza, p. ex.).'
    ];
    camposFormulario("text", $args);
}

function citacao () {
    $args = [
        "id"          => '',
        "name"        => 'lvm_people_citacao',
        "label"       => 'Citação como autor',
        "labelClass"  => '',
        "class"       => 'required',
        "placeholder" => 'Preencha o campo com a forma que deseja ser citado em bibliografias',
        "attributes"  => 'required',
        "obs"         => 'Ex.: Em <i>João Carlos da Silva Souza</i>, uma forma possível seria SOUZA, J.C.S.'
    ];
    camposFormulario("text", $args);
}

function sexo () {
    $args = [
        "name"        => 'lvm_people_sexo',
        "label"       => 'Sexo',
        "labelClass"  => '',
        "class"       => '',
        "attributes"  => ''
    ];
    camposFormulario("sexo", $args);
}

function nascimento (){
    $args = [
        "id"          => '',
        "name"        => 'lvm_people_nascimento',
        "label"       => 'Data de Nascimento',
        "labelClass"  => '',
    
        "dia"         => array(
            "include" => true,
            "class"   => ''
        ),
        
        "mes"         => array(
            "include" => true,
            "class"   => '',
            "attributes"  => ''
        ),
    
        "ano"       => array(
            "include" => true,
            "class"   => 'required',
            "attributes"  => 'required',
            "placeholder" => '00'
        )
    
    ];
    camposFormulario("data", $args);
}
?>