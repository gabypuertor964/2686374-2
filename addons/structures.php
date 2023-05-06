<?php

    function validacion_existencia($valor){
        if(isset($valor) && $valor<>null){
            return true;
        }else{
            return false;
        }
    }
    
    $id_row=0;
    function forms_generate($reception_route,$title_card,$data_inputs,$data_buttons,$data_card=null){
        global $id_row;

        $route=$reception_route['route'];
        $function=$reception_route['function'];

        $id_row++;

        if(validacion_existencia($data_card)){
            $acm_addon_card="";

            foreach($data_card as $addons){
                $addon_name=$addons['name'];
                $value=$addons['value'];

                $acm_addon_card.=" $addon_name='$value'";
            }

        }else{
            $acm_addon_card="";
        }

        $form="
            <div class='container text-center'>                        
                    <div class='card'>
                        <div class='card-header'>
                            <h4 class='card-title'>$title_card</h4>
                        </div>
                        <form action='../../../controllers/$route?function=$function'' method='post'>
                            <div class='card-body' $acm_addon_card>
                                <div class='row' id='row_$id_row'>
    
        ";

        $unit_col=12/(count($data_inputs));

        foreach($data_inputs as $input){

            $label=$input['label'];
            $type=$input['type'];
            $name=$input['name'];
            
            if(isset($input['placeholder'])){
                $placeholder=$input['placeholder'];
            }else{
                $placeholder="";
            }

            if(isset($input['min'])){
                $min=$input['min'];
            }else{
                $min=1;
            }

            if(isset($input['max'])){
                $max=$input['max'];
            }else{
                $max="";
            }

            if(isset($input['id'])){
                $id=$input['id'];
            }else{
                $id=$name;
            }

            if(isset($input['addons'])){
                $data_addons=$input['addons'];
                $acm_addon="";

                foreach($data_addons as $addon){
                    $addon_name=$addon['name'];
                    $value=$addon['value'];

                    $acm_addon.="$addon_name='$value'";
                }

            }else{
                $acm_addon="";
            }

            switch($type){
                case "select":

                    $form.=("
                        <div class='col-md-$unit_col'>
                            <label for='$name' class='form-label'>$label</label>
                            <select class='form-control' name='$name''id='$id'>
                                <option value='' style='text-align:center;'>Seleccione</option>
                    ");

                    if(isset($input['values'])){

                        $values=$input['values'];
                        foreach ($values as $value){

                            $input_value=strtolower($value);
    
                            $form.=("
                                        <option value='$input_value' style='text-align:center;'>$value</option>
                            ");
    
                        }
                    }
                        
                    $form.=("
                            </select>
                        </div>
                    ");
                    
                break;

                default:

                    switch($type){
                        case "float";
                            $type="number";
                            $acm_addon.="step=0.01";
                        break;
                    }

                    $form.="
                        <div class='col-md-$unit_col'>
                            <label for='$name' class='form-label'>$label</label>
                            <input type='$type' class='form-control' name='$name' id='$id' min='$min' placeholder='$placeholder' max='$max' $acm_addon style='text-align: center'>
                        </div>
                    ";
                break;
            }

            
        }

        $form.="
        
                                </div>
                            </div>
                            <div class='card-footer text-muted'>
                                <div class='row justify-content-center'>
    
        ";

        $unit_col=(12/(count($data_buttons)))-1;
        foreach($data_buttons as $data_button){
            $text_button=$data_button['text'];

            if(isset($data_button['btn_class'])){
                $btn_class=$data_button['btn_class'];
            }else{
                $btn_class="primary";
            }

            if(isset($data_button['onclick'])){
                $function_js=$data_button['onclick'];
                $type=" type='button' onclick=$function_js";
            }else{
                $type="type='submit'";
            }

            if(isset($data_button['id'])){
                $id=$data_button['id'];
            }else{
                $id="";
            }

            $form.="
                        <button $type id='$id' class='btn btn-$btn_class col-md-$unit_col'>$text_button</button>

                    </form>
            ";
        }

        $form.="
                                    </div>        
                                </div>
                            
                        </div>
                </div>
        ";

        echo($form);

    }

?>