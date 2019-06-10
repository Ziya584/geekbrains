<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">Товары</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <?php if (empty($list)): ?>
                            <p>Список товаров пуст</p>
                        <?php else: ?>
                            <table class="table">
                                <tr>
                                    <th>Название</th>
                                    <th>Редактировать</th>
                                    <th>Удалить</th>
                                </tr>
                                <?php foreach ($list as $val): ?>
                                    <tr>
<!--                                        <td>--><?php //echo htmlspecialchars($val['title'], ENT_QUOTES); ?><!--</td>-->
                                        <td><div class="media">
												<img src="../public/small/<?=$val['id']; ?>.png" class="mr-3" alt="...">
												<div class="media-body">
													<h5 class="mt-0"><?=$val['title']?></h5>
													<p><?=$val['short_description']?></p><p><?=$val['price']?> руб.</p>
												</div>
											</div></td>
                                        <td><a href="/admin/edit/<?php echo $val['id']; ?>" class="btn btn-primary">Редактировать</a></td>
                                        <td><a href="/admin/delete/<?php echo $val['id']; ?>" class="btn btn-danger">Удалить</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                            <?php echo $pagination; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>