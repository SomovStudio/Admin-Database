<div id="content">
    <?php
    /* BUTTON ADD */
    $buttonAdd = new Button('./index.php', 'Add', 30, 50, 5, 5);
    $buttonAdd->render();

    /* SEARCH */
    $searchPanel = new Search('./index.php?event=search', 'Enter value to search', 'Search', 65, 5);
    $searchPanel->render();

    if (isset($_POST['event'])) {
        if ($_POST['event'] === Constants::EVENT_EDIT) {
            $dataTable = DB::getData("SELECT * FROM articles WHERE(article_id=" . $_POST['article_id'] . ")");
        } elseif ($_POST['event'] === Constants::EVENT_SEARCH) {
            $search = $_POST['search'];
            $dataTable = DB::getData("SELECT * FROM articles WHERE(article_name='" . $search . "')");
        } elseif ($_POST['event'] === Constants::EVENT_ADD) {
            $dataTable = DB::setData("INSERT INTO articles (article_name, article_news_id, article_description) VALUES (" .
                            "'" . $_POST['article_name'] . "', " .
                            "" . $_POST['article_news_id'] . ", " .
                            "'" . $_POST['article_description'] . "'" .
                            ")");
            header("Location: ./index.php");
        } elseif ($_POST['event'] === Constants::EVENT_UPDATE) {
            $dataTable = DB::setData("UPDATE articles SET " .
                            "article_name = '" . $_POST['article_name'] . "', " .
                            "article_news_id = " . $_POST['article_news_id'] . ", " .
                            "article_description = '" . $_POST['article_description'] . "' " .
                            "WHERE(article_id=" . $_POST['article_id'] . ")");
            $dataTable = DB::getData("SELECT * FROM articles WHERE(article_id=" . $_POST['article_id'] . ")");
        } elseif ($_POST['event'] === Constants::EVENT_REMOVE) {
            $dataTable = DB::setData("DELETE FROM articles WHERE (article_id=" . $_POST['article_id'] . ")");
            header("Location: ./index.php");
        } elseif ($_POST['event'] === Constants::EVENT_TARGET) {
            $dataTable = DB::getData("SELECT * FROM articles WHERE(article_news_id=" . $_POST['news_id'] . ")");
        }

        $news = DB::getData('SELECT * FROM news');
        while ($row = mysqli_fetch_assoc($news)) {
            $dataNews[$row['news_id']] = [$row['news_id'], $row['news_name']];
        }

        mysqli_data_seek($dataTable, 0);
        $row = mysqli_fetch_assoc($dataTable);

        /* FORM */
        $form = new Form('Edit article', './index.php', Constants::EVENT_UPDATE, 440, 5, 400);
        $form->addTextBox('article_id', 'ID:', 'Enter id', $row['article_id'], false);
        $form->addTextBox('article_name', 'Name:', 'Enter name', $row['article_name']);
        $form->addComboBox('article_news_id', 'Mews', 'Select data', $dataNews, $row['article_news_id']);
        $form->addMemoBox('article_description', 'Description:', 'Enter description', $row['article_description']);
        $form->addButtonSave();
    } else {  //  DEFAULT
        $news = DB::getData('SELECT * FROM news');
        while ($row = mysqli_fetch_assoc($news)) {
            $dataNews[$row['news_id']] = [$row['news_id'], $row['news_name']];
        }

        $dataTable = DB::getData('SELECT * FROM articles');

        /* FORM */
        $form = new Form('Add article', './index.php', Constants::EVENT_ADD, 440, 5, 400);
        $form->addTextBox('article_id', 'ID:', 'Enter id', '', false);
        $form->addTextBox('article_name', 'Name:', 'Enter name', '');
        $form->addComboBox('article_news_id', 'Mews', 'Select data', $dataNews, '');
        $form->addMemoBox('article_description', 'Description:', 'Enter description', '');
        $form->addButtonSave();
    }

    /* TABLE */
    $table = new Table('Articles', 350, 5, 40);
    $table->addColunm('article_id', 'ID', 50);
    $table->addButtonEdit('index.php', ['article_id']);
    $table->addButtonDelete('index.php', ['article_id']);
    $table->addColunm('article_news_id', 'News', 50);
    $table->addColunm('article_name', 'Name', 200);
    $table->addColunm('article_description', 'Description', 500);
    $table->setData($dataTable);
    $table->render();

    /* FORM */
    if (isset($form)) {
        $form->render();
    }
    ?>
</div>