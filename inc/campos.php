<?php

// constrói as variáveis para inclusão na tag
// ex.: caso exista dado para $value, a função retorna "value=valor de value",
// se não, retorna uma string vazia
// function buildVar ( $array ) {
//     foreach ($array as $key => $value) {
//         if ( in_array($key, $attrs) ){
//             $$key = ( trim($value) != "" ) ? 
//                 "{$key}=\"{$value}\"" : "";
//         }
//     }
// };

function camposFormulario ($type, $args) {
    
    // global  $name, 
    //         $value, 
    //         $options, 
    //         $placeholder;

    // $allAttrs = ["name", "value", "options", "placeholder"];

    switch ($type) {
        
        case 'text':
            
            // atributos usados pela tag 
            // $attrs = ["name", "class", "value", "placeholder"];

            // construção das variáveis 
            // buildVar($args);

            // printf("<input type=\"text\" %1s %2s %3s %4s>", $name, $class, $value, $placeholder);
            break;
        
        default:
            # code...
            break;
    }
}
?>


