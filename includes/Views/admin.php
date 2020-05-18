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
                        <a href="/logout" class="nav-link" name="logout">Выход</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="row justify-content-center">
            <header class="headtext mb-4">
                <H2>Редактироват задачу</H2>
            </header>
        </div>
    </div>
</div>
<div class="container mb-5">
    <div class="col-lg-12">
        <div class="row justify-content-center">
            <form action="/admin?task_id=<?=$data['0']['id']?>" method="post">
                <div class="form-group text-center">
                    <label for="inputEmail3" style="color: white">Текс задачи</label>
                    <textarea name="editor1" class="form-control" cols="60" rows="6"><?=@$data['0']['task']?></textarea>
                </div>
                <div class="justify-content-center">
                    <div class="row justify-content-around">
                        <div class="form-check mb-2 col-6 col-lg-4 col-md-6" style="color: white; margin-top: 5px;">
                            <input name="done" class="form-check-input" type="checkbox" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Задача выполнено
                            </label>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <input type="submit" class="btn btn-self btn-sm btn-block btn-primary" name="edit"  value="Отправить">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>