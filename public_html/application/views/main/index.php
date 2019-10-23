<div class="container">
        <div class="col-md-2">
                <a class="btn btn-primary btn-lg" href="/admin/login">Авторизация</a>
        </div>
        <div class="col-md-10"><h3>Список задач</h3>
            <table id="example" class="display" style="width:100%" data-page-length='3'>
                <thead>
                <tr>
                    <th>Имя пользователя</th>
                    <th>Email</th>
                    <th>Текст задачи</th>
                    <th>Статус</th>
                </tr>
                </thead>
                <tbody>
                <?php if(empty($list)): ?>
                    <p>Список задач пуст</p>
                <?php else: ?>
                    <?php foreach ($list as $row):?>
                        <tr>
                            <td><?= $row['name']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['text']; ?></td>
                            <td><?php if($row['status'] == 0){
                                    echo 'Не выполнено';
                                }else{
                                    echo 'Выполнено';
                                } ?></td>
                        </tr>
                    <?php endforeach;?>
                <?php endif;?>
            </table>
            <div class="col-md-4">
                <form id="addtask" action="/" method="post">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Имя пользователя</label>
                        <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Имя пользователя">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email address">
                        <small id="emailHelp"  class="form-text text-muted">Мы никогда не будем делиться вашей электронной почтой с кем-либо еще.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea">Текст задачи</label>
                        <textarea class="form-control" name="text" id="exampleTextarea" rows="3"></textarea>
                    </div>
                    <button type="submit" name="enter" class="btn btn-primary">Добавить</button>
                </form>
            </div>
        </div>
</div>
