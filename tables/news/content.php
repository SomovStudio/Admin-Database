<div id="content">
    <?php
    /* BUTTON ADD */
    $buttonAdd = new Button('./index.php', 'Add', 30, 50, 5, 5);
    $buttonAdd->render();

    /* SEARCH */
    $searchPanel = new Search('./index.php?event=search', 'Enter value to search', 'Search', 65, 5);
    $searchPanel->render();

    if (isset($_GET['event'])) {
        if ($_GET['event'] === Constants::EVENT_EDIT) {
            $dataTable = DB::getData("SELECT * FROM news WHERE(news_id=" . $_GET['news_id'] . ")");
                    
        } elseif ($_GET['event'] === Constants::EVENT_SEARCH) {
            $search = $_POST['search'];
            $dataTable = DB::getData("SELECT * FROM news WHERE(news_name='" . $search . "')");
            
        } elseif ($_GET['event'] === Constants::EVENT_ADD) {
            $dataTable = DB::setData("INSERT INTO news (news_name, news_date, news_description) VALUES (" .
                    "'" . $_POST['news_name'] . "', " .
                    "'" . $_POST['news_date'] . "', " .
                    "'" . $_POST['news_description'] . "'" .
                    ")");
            header("Location: ./index.php?");
            
        } elseif ($_GET['event'] === Constants::EVENT_UPDATE) {
            $dataTable = DB::setData("UPDATE news SET " .
                    "news_name = '" . $_POST['news_name'] . "', " .
                    "news_date = '" . $_POST['news_date'] . "', " .
                    "news_description = '" . $_POST['news_description'] . "' " .
                    "WHERE(news_id=" . $_POST['news_id'] . ")");
            $dataTable = DB::getData("SELECT * FROM news WHERE(news_id=" . $_POST['news_id'] . ")");
            
        } elseif ($_GET['event'] === Constants::EVENT_REMOVE) {
            $dataTable = DB::setData("DELETE FROM news WHERE (news_id=" . $_GET['news_id'] . ")");
            header("Location: ./index.php?");
            
        } elseif ($_GET['event'] === Constants::EVENT_TARGET) {
            
        }

        mysqli_data_seek($dataTable, 0);
        $row = mysqli_fetch_assoc($dataTable);
        
        
        /* FORM */
        $form = new Form('Edit news', './index.php', Constants::EVENT_UPDATE, 440, 5, 400);
        $form->addTextBox('news_id', 'ID:', 'Enter id', $row['news_id'], false);
        $form->addTextBox('news_name', 'Name:', 'Enter name', $row['news_name']);
        $form->addTextBox('news_date', 'Date:', 'Enter date', $row['news_date']);
        $form->addMemoBox('news_description', 'Description:', 'Enter description', $row['news_description']);
        $form->addButtonSave();
        
    } else {  //  DEFAULT
        $dataTable = DB::getData('SELECT * FROM news');

        /* FORM */
        $form = new Form('Add news', './index.php', Constants::EVENT_ADD, 440, 5, 400);
        $form->addTextBox('news_id', 'ID:', 'Enter id', '', false);
        $form->addTextBox('news_name', 'Name:', 'Enter name', '');
        $form->addTextBox('news_date', 'Date:', 'Enter date', date('Y-m-d H:i:s'));
        $form->addMemoBox('news_description', 'Description:', 'Enter description', '');
        $form->addButtonSave();
    }

    /* TABLE */
    $table = new Table('News', 350, 5, 40);
    $table->addColunm('news_id', 'ID', 50);
    $table->addButtonEdit('index.php', ['news_id']);
    $table->addButtonDelete('index.php', ['news_id']);
    $table->addColunm('news_date', 'Date', 100);
    $table->addColunm('news_name', 'Name', 150);
    $table->addColunm('news_description', 'Description', 400);
    $table->setData($dataTable);
    $table->render();

    /* FORM */
    if (isset($form))
        $form->render();
    ?>
</div>