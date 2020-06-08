<div class="container">
    <div class="col-lg-12">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark shadow-lg mb-3">
            <a class="navbar-brand" href="/index.php">Главная </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/addtask">Добавит задачу</a>
                    </li>
                    <?php
                    if (!$user['isLoggedIn']){
                        echo '<li class="nav-item"><a href="/login" class="nav-link">Вход</a></li>';
                    }
                    else{
                        echo '<li class="nav-item"><a href="/logout" class="nav-link" name="logout">Выход</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </nav>
        <div class="row justify-content-center">
            <h3 style="color: white" class="mr-4">Сортировка</h3>
            <div class="btn-group-sm mr-2 mb-2">
                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    по имени
                </button>
                <div class="dropdown-menu dropdown-menu-sm-right">
                    <a class="dropdown-item" href="?p=<?php echo $_GET['p'];?>&sort=ASC&by=name">возрастание</a>
                    <a class="dropdown-item" href="?p=<?php echo $_GET['p'];?>&sort=DESC&by=name">убывание</a>
                </div>
            </div>
            <div class="btn-group-sm mr-2 mb-2">
                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    по Email
                </button>
                <div class="dropdown-menu dropdown-menu-sm-right">
                    <a class="dropdown-item" href="?p=<?php echo $_GET['p'];?>&sort=ASC&by=email">возрастание</a>
                    <a class="dropdown-item" href="?p=<?php echo $_GET['p'];?>&sort=DESC&by=email">убывание</a>
                </div>
            </div>
            <div class="btn-group-sm mr-2 mb-2">
                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    по статусу
                </button>
                <div class="dropdown-menu dropdown-menu-sm-right">
                    <a class="dropdown-item" href="?p=<?php echo $_GET['p'];?>&sort=ASC&by=status">возрастание</a>
                    <a class="dropdown-item" href="?p=<?php echo $_GET['p'];?>&sort=DESC&by=status">убывание</a>
                </div>
            </div>
        </div>

        <div class="row">
            <table class="table table-hover table-dark table-responsive-sm">
                <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col"><i class="fa fa-user"></i></th>
                    <th scope="col"><i class="fa fa-tasks"></i></th>
                    <th scope="col"><i class="fa fa-envelope"></i></th>
                    <th scope="col">Статус</th>
                    <th scope="col"><i class="fa fa-pencil-square-o"></i></th>
                    <?php if ($user['isLoggedIn'] and $user['userStatus'] == 'admin'){?>
                        <th scope="col"><i class="fa fa-pencil"></i></th>
                    <?php }?>
                </tr>
                </thead>
                <tbody class="text-center">
                    <?php foreach ($pn['data'] as $val): ?>
                    <tr>
                        <th scope="row"><?=$val['id']; ?></th>
                        <td><?=$val['name']; ?></td>
                        <td><?=$val['task']; ?></td>
                        <td><?=$val['email']; ?></td>
                        <td><?=$val['status']; ?></td>
                        <td>
                            <?php if ($val['edit_by_admin']){?>
                                <span ><i class="fa fa-check"></i></span>
                            <?php }?>
                        </td>
                        <?php if ($user['isLoggedIn'] and $user['userStatus'] == 'admin'){?>
                        <td>
                            <a href="/admin?task_id=<?=$val['id']?>" class="btn-sm"><i class="fa fa-pencil"></i></a>
                        </td>
                        <?php }?>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
        <div class="col-lg-12 mb-4">
            <div class="row justify-content-center">
                <div class="bnt-group d-flex">
                    <a class="btn btn-sm btn-primary mr-2 <?php echo $pn['preve_dis']; ?>" style="color: white" href="/index.php?p=<?php echo $pn['preve']; ?>"><i class="fa fa-angle-left"></i></a>
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-2" role="group" aria-label="First group">
                            <?php
                            if($pn['pages'] <= 10){
                                for($i=1; $i<=$pn['pages']; ++$i):?>
                                    <a class="btn btn-sm btn-primary" style="color: white" href="/index.php?p=<?php echo $i;?>"><?php echo $i;?></a>
                                <?php
                                endfor;
                            }
                            elseif ($pn['pages'] > 10) {
                                $inter = 10;
                                for ($i = 0; $i < $inter; ++$i):
                                    if ($_GET['p'] > $i+1){
                                        $inter+=$_GET['p']-1;
                                        if (($_GET['p']-1) <= $pn['pages']-10) {
                                            $i = $_GET['p']-1;
                                        }elseif ($_GET['p'] > $pn['pages']-10 && $i == 0){
                                            $i = $pn['pages']-10;
                                        }
                                    }
                                    ?>
                                    <a class="btn btn-sm btn-primary" style="color: white" href="/index.php?p=<?php echo $i+1;?>"><?php echo $i+1;?></a>
                                    <?php
                                    if ($pn['pages'] <= $i+1){
                                        break;
                                    }
                                endfor;
                            }
                            ?>
                        </div>
                    </div>
                    <a class="btn btn-sm btn-primary <?php echo $pn['next_dis']; ?>" style="color: white" href="/index.php?p=<?php echo $pn['next']; ?>" ><i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
