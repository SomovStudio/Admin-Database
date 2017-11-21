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
                    
        } elseif ($_GET['event'] === Constants::EVENT_SEARCH) {
            
        } elseif ($_GET['event'] === Constants::EVENT_ADD) {
            
        } elseif ($_GET['event'] === Constants::EVENT_UPDATE) {
            
        } elseif ($_GET['event'] === Constants::EVENT_REMOVE) {
            
        } elseif ($_GET['event'] === Constants::EVENT_TARGET) {
            
        }

        
    } else {  //  DEFAULT
    	$dataTable = DB::getData('SELECT * FROM articles');

    	/* FORM */
        $path = './index.php?event=' . Constants::EVENT_ADD;
        $form = new Form('Add article', $path, 440, 5, 400);
        $form->addTextBox('article_id', 'ID:', 'Enter id', '', false);
        $form->addTextBox('article_name', 'Name:', 'Enter name', '');
        $form->addComboBox('article_news_id', 'Mews', 'Select data', [1,2,3], 1);
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
    if (isset($form))
        $form->render();

    ?>
</div>