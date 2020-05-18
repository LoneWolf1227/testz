<?php


namespace classes;


class paginData
{
    function Pagin($result, $option, $perPage){
        $rowCount = count($result);
        $tasks = array(array());

        $pages = ceil($rowCount / $perPage);

        for($i=0; $i<$pages; ++$i){

            if(!empty($result)){
                if (count($result) >= $perPage) {
                    for ($j=0; $j < $perPage; ++$j) {
                        $tasks['page'.$i][$j] = $result[$j];
                        unset($result[$j]);
                    }
                    sort($result);
                }elseif(count($result) < $perPage)
                {
                    $tasks['page'.$i] = $result;
                }
            }
        }

        if  ($option == array()){
            $data = $tasks['page0'];
        }
        if (!empty($option['p'])){
            $data=$tasks['page'.($option['p']-1)];
        }


        @$preve = ($option['p']-1);
        if ($preve <= 0 ){
            $preve_dis = 'disabled';
        }
        else $preve_dis ='';
        @$next = ($option['p']+1);
        if ($next == 1){
            $next++;
        }
        if ($next > $pages){
            $next_dis = 'disabled';
        }
        else $next_dis ='';

        return array(
            'preve' => $preve,
            'preve_dis' => $preve_dis,
            'next' => $next,
            'next_dis' => $next_dis,
            'data' => $data,
            'pages' => $pages
        );
    }
}