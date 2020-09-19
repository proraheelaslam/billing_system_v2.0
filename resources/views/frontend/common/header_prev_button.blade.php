<div class="nextPrev_btns">

    <?php
        $url = url()->previous();
        $paramName = Request::segment(2);
        //$secondLastParam = Request::segments();
        //echo $secondLastParam;
        if ($paramName == 'show'){
            $url = url('clients');
        }else if ($paramName == 'edit'){
            $url = url('clients');

        }

    ?>

    <a style="display: block !important;" class="next_btn" href="{{url()->previous()}}"></a>

</div>