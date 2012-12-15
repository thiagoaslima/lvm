<?php 
function getDados ($post_id, $metaCampos) {
    $metaDados = get_post_meta ($post_id);

    foreach ($metaCampos as $key => $value) {
        if( !is_array($metaDados[$value]) ){
            $$key = (isset($metaDados[$value]) ? 
                     $metaDados[$value] : "";
        } else {
            $$key = $metaDados[$key]["name"];

            foreach ($metaDados[$key] as $k => $v) {
                if( $k != "name" ) {
                    $var = $key
                    $$k = $metaDados[$key]["name"] . $v;
                }
            }

        }
    }
}
 ?>