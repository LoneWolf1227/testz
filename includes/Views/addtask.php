<div class="container">
    <div class="col-lg-12">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark shadow-lg mb-3">
            <a class="navbar-brand" href="/index.php">Главная</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/addtask">Добавит задачу</a>
                    </li>
                    <li class="nav-item">
                        <?php
                        if (!$user['isLoggedIn']){
                            echo '<a href="/login" class="nav-link">Вход</a>';
                        }
                        else{
                            echo '<a href="/logout" class="nav-link" name="logout">Выход</a>';
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="row justify-content-center">
            <header class="headtext mb-4">
                <H2>Добавит задачу</H2>
            </header>
        </div>
    </div>
</div>
<div class="container mb-5">
    <div class="col-lg-12">
        <?php if(!empty($massage['massage'])){ ?>
            <div class="row justify-content-center">
                <div class="alert alert-<?php echo $massage['type'] ?> alert-dismissible fade show" role="alert">
                    <?php echo $massage['massage']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        <?php } ?>
        <div class="row justify-content-center">
            <form action="/addtask" method="post">
                <div class="form-group">
                    <div class="row justify-content-center">
                        <div class="input-group mb-2 col-lg-5" style="margin-right: 4px">
                            <input type="text" name="name" class="form-control" placeholder="Имя" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-user-o"></i></span>
                            </div>
                        </div>
                        <div class="input-group mb-2 col-lg-5">
                            <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-envelope-o"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center">
                    <label for="inputEmail3" style="color: white">Текс задачи</label>
                    <textarea name="editor1" class="form-control" rows="5"></textarea>
                </div>
                <div class="justify-content-center">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <input class="btn btn-self btn-sm btn-block btn-primary" name="addtask" type="submit" value="Отправить">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>$('.alert').alert();</script>