<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/admin/edit/<?php echo $data['id']; ?>" method="post" >
                        	<div class="form-group">
								<label>Название</label>
								<input class="form-control" type="text" value="<?php echo htmlspecialchars($data['title'], ENT_QUOTES); ?>" name="title" autocomplete="off" >
							</div>
							<div class="form-group">
								<label>Описание</label>
								<textarea class="form-control" rows="3" name="description" autocomplete="off" ><?php echo htmlspecialchars($data['description'], ENT_QUOTES); ?></textarea>
							</div>
							<div class="form-group">
								<label>Цена</label>
								<input class="form-control" type="number" value="<?php echo htmlspecialchars($data['price'], ENT_QUOTES); ?>" name="price" autocomplete="off" placeholder="Введите цену товара">
							</div>
                            <div class="form-group">
                                <label>Изображение</label>
                                <input class="form-control" type="file" name="img">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>