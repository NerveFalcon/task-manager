<section class="createUser">
    <form action="" method="post">
        <fieldset class="Tcenter">
            <legend>Добавление задачи</legend>
            <?php print_r($_POST) ?>
            <div class="fio">
                <div class="flex-container-row">
                    <div class="flex-item">
                        <input type="text" name="title" placeholder="Название">
                    </div>
                    <span class="flex-item">Ожидание</span>
                </div>

                <textarea name="text" rows="10" placeholder="Описание"></textarea>
                <label for="workers"> </label>
            </div>
            <div class="flex-container-row">
                <div class="create-workers flex-item width-50">
                    <h4>Исполнители</h4>
                    <!-- <input type="text" placeholder="Поиск по фамилиям"> -->
                    <select name="selected[]" id="selected" multiple></select>
                </div>
                <div class="flex-item width-50">
                    <select id="possible" multiple>
                        <?php foreach ($params as $position) : ?>
                            <option onclick="selectPossible(this)" value="<?php echo $position['id'] ?>"><?php echo $position['fio'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div>
                <label for="deadline"></label>
                <input type="date" name="deadline" id="email" placeholder="Введите дату">
            </div>
            <a href="/outTasks"><button>Отменить</button></a>
            <input type="reset" value="Сбросить">
            <input type="submit" value="Создать">
        </fieldset>
    </form>
</section>