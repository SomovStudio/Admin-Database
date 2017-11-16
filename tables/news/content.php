<div id="content">
<?php
/* BUTTON ADD */
$buttonAdd = new Button('./index.php', 'Add', 30, 50, 5, 5);
$buttonAdd->render();

/* SEARCH */
$searchPanel = new Search('./index.php?event=search', 'Enter value to search', 'Search', 65, 5);
$searchPanel->render();

if(isset($_GET['event']))
{
   if($_GET['event'] === 'edit')
    {
        /* QUERY */
        $news_id = $_GET['news_id'];
        $dataTable = DB::select('SELECT * FROM news WHERE(news_id='.$news_id.')', Config::$Server, Config::$DatabaseMain, Config::$RootUserName, Config::$RootUserPass);
    }
    elseif ($_GET['event'] === 'search')
    {
        
    }
    elseif ($_GET['event'] === 'add')
    {
        
    }
    elseif ($_GET['event'] === 'update')
    {
        
    }
    elseif ($_GET['event'] === 'remove')
    {
        
    }
    
    /* FORM */
    mysqli_data_seek($dataTable, 0);
    $row = mysqli_fetch_assoc($dataTable);
    $form = new Form('Add/Edit', './', 440, 5, 400);
    $form->addTextBox('news_id', 'ID:', 'Enter id', $row['news_id'], false);
    $form->addTextBox('news_name', 'Name:', 'Enter name', $row['news_name']);
    $form->addTextBox('news_date', 'Date:', 'Enter date', $row['news_date']);
    $form->addMemoBox('news_description', 'Description:', 'Enter description', $row['news_description']);
    $form->addButtonSave();
}else{  //  DEFAULT
    
    /* QUERY */
    $dataTable = DB::select('SELECT * FROM news', Config::$Server, Config::$DatabaseMain, Config::$RootUserName, Config::$RootUserPass);
    
    /* FORM */
    $form = new Form('Add/Edit', './', 440, 5, 400);
    $form->addTextBox('news_id', 'ID:', 'Enter id', '', false);
    $form->addTextBox('news_name', 'Name:', 'Enter name', '');
    $form->addTextBox('news_date', 'Date:', 'Enter date', date('Y-m-d H:i:s'));
    $form->addMemoBox('news_description', 'Description:', 'Enter description', '');
    //$form->addComboBox('ComboBox1', 'Data', 'Select data', [1,2,3], 2);
    $form->addButtonSave();
}

/* TABLE */
$table = new Table('News', 350, 5, 40);
$table->addColunm('news_id', 'ID', 50);
$table->addButtonEdit('index.php', ['news_id']);
$table->addButtonDelete('index.php', ['news_id']);
$table->addColunm('news_date','Date', 100);
$table->addColunm('news_name','Name', 150);
$table->addColunm('news_description','Description', 400);
$table->setData($dataTable);
$table->render();

/* FORM */
if(isset($form)) $form->render();
?>
</div>