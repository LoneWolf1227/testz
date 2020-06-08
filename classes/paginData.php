<?php


namespace classes;


class paginData
{
    public function Pagin($result, $option, $perPage){
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


        @$previous = ($option['p']-1);
        if ($previous <= 0 ){
            $previous_dis = 'disabled';
        }
        else $previous_dis ='';
        @$next = ($option['p']+1);
        if ($next == 1){
            $next++;
        }
        if ($next > $pages){
            $next_dis = 'disabled';
        }
        else $next_dis ='';

        return array(
            'preve' => $previous,
            'preve_dis' => $previous_dis,
            'next' => $next,
            'next_dis' => $next_dis,
            'data' => $data,
            'pages' => $pages
        );
    }
}