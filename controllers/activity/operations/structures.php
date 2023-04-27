<?php

    function forms_generate($function,$title_card,$inputs_data,$button_submit){
        $form="
            <div class='container text-center'>        
                <form action='../../../controllers/activity/operations/logistic.php?function=$function'' method='post'>
                    <div class='card'>
                        <div class='card-header'>
                            <h4 class='card-title'>$title_card</h4>
                        </div>
                        <div class='card-body'>
                            <div class='row'>
        
        ";

        $unit_col=12/(count($inputs_data));

        foreach($inputs_data as $input){

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
            

            $form.="
                <div class='col-md-$unit_col'>
                    <label for='$name' class='form-label'>$label</label>
                    <input type='$type' class='form-control' name='$name' min=$min placeholder='$placeholder'>
                </div>
            ";

        }

        $form.="
        
                            </div>
                        </div>
                        <div class='card-footer text-muted'>
                            <button type='submit' class='btn btn-primary col-md-12'>$button_submit</button>
                        </div>
                    </div>
                </form>
            </div>
        
        ";

        echo($form);

    }

?>