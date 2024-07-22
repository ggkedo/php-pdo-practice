<?php

$db_user = 'root';
$db_pass = 'mysql';
$db_name = 'iec_test';

//dsn: connection string
$dsn = 'mysql:host=localhost;dbname='.$db_name.';charset=utf8mb4';
$db = new PDO($dsn, $db_user, $db_pass);

function get_done()
{
    if(isset($_GET['done'])) 
    {
        return $_GET['done'];
    }
}

function get_func()
{
    if(isset($_GET['func'])) 
    {
        return $_GET['func'];
    }
}

function get_post($par)
{
    if(isset($_POST[$par]))
    {
        return $_POST[$par];
    }
}

function get_tasks($status)
{
    global $db;
    $sql = "SELECT * FROM todo WHERE status = ". $status;
    $query = $db->query($sql);
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);

    return $rows;
}

function list_active_tasks()
{
    global $db;
    $sql = "SELECT * FROM todo WHERE status = 0 ORDER BY id ASC";
    $query = $db->query($sql);
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rows as $task)
    {
        echo '<li>
                <h3>'. $task['title'] .'</h3>
                <p>'. $task['description'] .'</p>
                <div>
                    <a href="?done='. $task['id'] .'&func=list">
                        <i class="fas fa-check"></i> Elkészült
                    </a>
                </div>
            </li>';
    }
}

function complete_task($id)
{
    global $db;
    $sql = "UPDATE todo SET status = 1 WHERE id = :id";
    $query = $db->prepare($sql);
    $query->execute(['id' => $id]);
}

function submit_form()
{
    global $db;
    $title = get_post('title');
    $description = get_post('description');
    if($title && $description)
    {
        $sql = "INSERT INTO todo (title, description, status) VALUES(:title, :description, :status)";
        $query = $db->prepare($sql);
        $query->execute(
            [
                'title' => $title, 
                'description' => $description,
                'status' => 0,
            ]
        );
        return true;
    }
    else
    {
        return false;
    }
}

function show_form()
{
    echo '<section class="input">
            <h2>Új teendő hozzáadása</h2>
            <form action="" method="post">';
    
    if(isset($_POST['send']))
    {
        $result = submit_form();
        //$title = get_post('title');
        //$description = get_post('description');
        //if($title && $description)
        if($result)
        {
            echo '<p class="messageSuccess">
                Az új teendő adatai sikeresen rögzítésre kerültek
            </p>';
        }
        else
        {
            echo '<p class="messageFail">
                Teendő felvétele sikertelen, az összes mező kitöltése szükséges
            </p>';
        }
    }
    
    echo '
            <div>
                <label for="title">Megnevezés</label>
                <input type="text" id="title" name="title">
            </div>
            <div>
                <label for="description">Leírás</label>
                <textarea id="description" name="description"></textarea>
            </div>
            
            <button name="send">Hozzáadás</button>
            
        </form>
        
    </section>';
} 

function show_tasks()
{
    echo '<section class="collection">
        <h2>Teendők listája</h2>
        <ul class="list">';
    list_active_tasks();
    echo '</ul></section>';
}
?>