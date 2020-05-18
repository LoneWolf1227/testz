<div class="container">
    <div class="col-lg-12">
        <div class="row justify-content-center form">
            <div class="col-lg-5 col-md-6 col-sm-6 text-center justify-content-center">
                <?php if(!empty($massage['massage'])){ ?>
                    <div class="alert alert-<?=$massage['type'] ?> alert-dismissible fade show" role="alert">
                        <?=$massage['massage']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>
                <h2 style="color: white" class="mb-2">Вход</h2>
                <div class="row justify-content-center">
                <form action="/login" method="POST" class="col-lg-9">
                    <div class="input-group mb-3 col-12" style="margin-right: 4px">
                        <input type="text" name="name" class="form-control" placeholder="Имя" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2"><i class="fa fa-user-o"></i></span>
                        </div>
                    </div>
                    <div class="input-group mb-3 col-12" style="margin-right: 4px">
                        <input type="password" name="password" class="form-control" placeholder="Пароль" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2"><i class="fa fa-key"></i></span>
                        </div>
                    </div>
                    <p class="col-12"><button class="btn btn-self btn-block " type="submit" name="login" style="color:white; background-color: rgba(192, 64, 224, 0.66);" value="login"><i class="fa fa-sign-in"></i></button></p>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>