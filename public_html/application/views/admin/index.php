<div class="container">
    <div class="row">
            <h3>Страница админа</h3>
            <table class="sort table">
                <thead>
                <tr>
                    <th>Имя пользователя</th>
                    <th>Email</th>
                    <th>Текст задачи</th>
                    <th>Статус</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                    <?php foreach ($task as $row):?>
                        <tr>
                            <td><?= $row['name']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['text']; ?></td>
                            <td><?php if($row['status'] == 0){
                                    echo 'Не выполнено';
                                }else{
                                    echo 'Выполнено';
                                } ?></td>
                            <td><a href="edit/<?= $row['id']; ?>">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </a></td>
                        </tr>

                    <?php endforeach;?>
                </tbody>
            </table>
    </div>
</div>
