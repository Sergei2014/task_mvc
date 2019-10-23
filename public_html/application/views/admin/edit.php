<div class="container">
    <h3>Страница редактирования</h3>
    <div class="row">
        <div class="col-4">
            <form id="edittask" action="/admin/edit/<?php echo $data['id'];?>" method="post">
                <div class="form-group">
                    <label for="formGroupExampleInput">Имя пользователя</label>
                    <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Имя пользователя" value="<?php echo htmlspecialchars($data['name'], ENT_QUOTES); ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email address" value="<?php echo htmlspecialchars($data['email'], ENT_QUOTES); ?>">
                    <small id="emailHelp"  class="form-text text-muted">Мы никогда не будем делиться вашей электронной почтой с кем-либо еще.</small>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea">Текст задачи</label>
                    <textarea class="form-control" name="text" id="exampleTextarea" rows="3" ><?php echo htmlspecialchars($data['text'], ENT_QUOTES); ?></textarea>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <?php echo '<input class="form-check-input" type="checkbox" name="status"  id="'.$data['status'].'"'.(($data['status']==1) ? 'checked' : '').'>';?>
                        Отметить если выполнено!
                    </label>
                </div>
                <button type="submit" name="enter" class="btn btn-primary">Обновить</button>
            </form>
        </div>
    </div>
</div>