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
            'previous' => $previous,
            'previous_dis' => $previous_dis,
            'next' => $next,
            'next_dis' => $next_dis,
            'data' => $data,
            'pages' => $pages
        );
    }

    public function paginButtons($pages, $previous, $previous_dis, $next, $next_dis)
    {
        $buttonsStack ='';
        $startOfButtons = '<div class="bnt-group d-flex">
             <a class="btn btn-sm btn-primary mr-2 '.$previous_dis.'" 
             style="color: white" href="/index.php?p='.$previous.'"><i class="fa fa-angle-left"></i></a>
                 <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                     <div class="btn-group mr-2" role="group" aria-label="First group">';
                            if($pages <= 10){
                                for($i=1; $i<=$pages; ++$i){
                                    $buttonsStack .= '<a class="btn btn-sm btn-primary" 
                                   style="color: white" href="/index.php?p='.$i.'">'.$i.'</a>';
                                }
                            }
                            elseif ($pages > 10) {
                                $inter = 10;
                                for ($i = 0; $i < $inter; ++$i) {
                                    if ($_GET['p'] > $i + 1) {
                                        $inter += $_GET['p'] - 1;
                                        if (($_GET['p'] - 1) <= $pages - 10) {
                                            $i = $_GET['p'] - 1;
                                        } elseif ($_GET['p'] > $pages - 10 && $i == 0) {
                                            $i = $pages - 10;
                                        }
                                    }
                                    $buttonsStack = '<a class="btn btn-sm btn-primary" style="color: white" href="/index.php?p=' . $i . +1;
                                    '">' . $i . +1;
                                    '</a>';

                                    if ($pages <= $i + 1) {
                                        break;
                                    }
                                }
                            }
                            $endOfButtons = '</div>
                 </div>
             <a class="btn btn-sm btn-primary echo '.$next_dis.'" style="color: white" href="/index.php?p='.$next.'" >
                <i class="fa fa-angle-right"></i>
             </a>
        </div>';

        return array(
            'startOfButtons' => $startOfButtons,
            'buttonsStack' => $buttonsStack,
            'endOfButtons' => $endOfButtons,
        );
    }
}
