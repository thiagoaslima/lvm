<?php

function createLabel( $label, $labelClass, $name ){
    printf("<label class=\"%1\$s\" for=\"%2\$s\">%3\$s</label>", $labelClass, $name, $label);
}

function leadingZeros($num,$numDigits) {
   return sprintf("%0".$numDigits."d",$num);
}

function grupo ( $last = false /* callbacks */){

    $funcs = func_get_args();
    array_shift($funcs);
    $last = ($last) ? " last" : "";

    echo "<div class='lvm_sep $last'>";

    foreach ($funcs as $func) {
        echo "<p>";
        $func();
        echo "</p>";
    }

    echo "</div>";
}

function camposFormulario ($type, $args) {

    //separar cada elemento do array $args em uma variável
    extract($args);

    //buscar o valor do metadado gravado na DB.
    $value = ( isset($metaDados) && 
                isset($metaDados[$name]) ) ? $metaDados[$name] : "";

    // gerar o label antes do campo do formulário
    if ( isset($label) ){
        createLabel($label, $labelClass, $name);
    }

    switch ($type) {

        case "url":
        case 'text':
            $attrs = ["id", "class", "name", "value", "placeholder", "attributes", "obs"];
            foreach ($attrs as $att) { if (!isset($$att)) { $$att = ""; } }

            printf("<input id=\"%1\$s\" type=\"%2\$s\" class=\"%3\$s\" name=\"%4\$s\" value=\"%5\$s\" placeholder=\"%6\$s\" %7\$s >", $id, $type, $class, $name, $value, $placeholder, $attributes);
            printf("<span class=\"obs\">%s</span>", $obs);
            break;


        case "sexo":
            $attrs = ["class", "name", "value", "attributes"];
            foreach ($attrs as $att) { if (!isset($$att)) { $$att = ""; } }

            printf("<input type=\"radio\" class=\"%1\$s masc\" name=\"%2\$s\" value=\"Masculino\" %3\$s %4\$s> Masculino", $class, $name, selected($value, "Masculino", false), $attributes);

             printf("<input type=\"radio\" class=\"%1\$s fem\" name=\"%2\$s\" value=\"Feminino\" %3\$s %4\$s> Feminino", $class, $name, selected($value, "Feminino", false), $attributes);
            break;


        case "data":
            $d = $m = $a = ""; 

            if ( isset($dia) && isset($dia["include"]) ) {
                global $d;
                $dia["name"] = $name . "_dia";
                $d = camposFormulario("data-dia", $dia) . " / ";
            }
            if ( isset($mes) && isset($mes["include"]) ) {
                global $m;
                $mes["name"] = $name . "_mes";
                $m = camposFormulario("data-mes", $mes) . " / ";
            }
            if ( isset($ano) && isset($ano["include"]) ) {
                global $a;
                $ano["name"] = $name . "_ano";
                $a = "20" . camposFormulario("data-ano", $ano);
            }

            $attrs = ["id"];
            foreach ($attrs as $att) { if (!isset($$att)) { $$att = ""; } }

            printf("<div id=\"%1\$s\" class="dataField">%2\$s %3\$s %4\$s</div>", $id, $d, $m, $a);


        case "data-dia":
            $attrs = ["name", "class"];
            foreach ($attrs as $att) { if (!isset($$att)) { $$att = ""; } }

            $html = sprintf("<select name=\"%1\$s\" class=\"%2\$s\">", $name, $class);
            $options = "";

            for($i=0; $i<32; $i++){
                $d = ($i == 0) ? "" : 
                    ( ($i < 10) ? leadingZeros($i, 2) : (string)$i );
               
                $options .= sprintf("<option %3\$s value=\"%1\$d\">%2\$s</option>", $i, $d, selected($value, $i, false)); 
            }

            return $html . $options . "</select>";

        case "data-mes":
            $meses = ["", "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
            $mesesMin = ["", "Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"];
            $m = $mMin = "";

            $attrs = ["name", "class", "attributes"];
            foreach ($attrs as $att) { if (!isset($$att)) { $$att = ""; } }

            for($i=0; $i<13; $i++){
                $m .= sprintf("<option %2\$s value=\"%1\$s\">%1\$s</option>", $meses[$i], selected($value, $meses[$i], false)); 
                $mMin .= sprintf("<option %2\$s value=\"%1\$s\">%1\$s</option>", $mesesMin[$i], selected($value, $mesesMin[$i], false)); 
            }

            $html = sprintf("<select class=\"extenso %1\$s\" name=\"%2\$s\" %3\$s>%4\$s</select><select class=\"abreviado %1\$s\" name=\"%2\$s\" %3\$s>%5\$s</select>", $class, $name, $attributes, $m, $mMin);

            return $html;

        case "data-ano":
            $attrs = ["name", "class", "attributes", "placeholder"];
            foreach ($attrs as $att) { if (!isset($$att)) { $$att = ""; } }

            $html = sprintf("<input type=\"number\" class=\"%1\$s\" max=\"99\" min=\"00\" name=\"%2\$s\" value=\"%3\$s\" placeholder=\"%4\$s\" %5\$s>", $class, $name, $value, $placeholder, $attributes);
            return $html;


        
        default:
            # code...
            break;
    }
}

?>


