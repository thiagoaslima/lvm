<?php

function camposFormulario ($type, $args) {

        function createLabel( $label, $labelClass, $name ){
            printf("<label class=\"%1s\" for=\"%2s\">%3s</label>", $labelClass, $name, $label);
        }

        function leadingZeros($num,$numDigits) {
           return sprintf("%0".$numDigits."d",$num);
        }


        //separar cada elemento do array $args em uma variável
        extract($args);

        //buscar o valor do metadado gravado na DB.
        $value = isset( $metaDados) && isset( $metaDados[$name] ) ? $metaDados[$name] : "";

        // gerar o label antes do campo do formulário
        if ( isset($label) ){
            createLabel($label, $labelClass, $name);
        }

    switch ($type) {
        case 'text':

            printf("<input type=\"text\" name=\"%1s\" class=\"%2s\" value=\"%3s\" placeholder=\"%4s\">", $name, $class, $value, $placeholder);

            break;
        
        default:
            # code...
            break;
    }
}

?>


