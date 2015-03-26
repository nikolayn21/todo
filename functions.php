<?php

/**
 * Updates a single task by it's id
 */
function updateTasks() {
    // check whether we have the id of the task in the get request
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $connection = dbConnect();
        
        // check whether we have get or post request
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $query = "SELECT * FROM tasks WHERE id = $id AND userId = " . $_SESSION['userId'];
            
            $result = mysql_query($query, $connection);            
            $task = mysql_fetch_assoc($result);            
            
            mysql_close($connection);
            
            return $task;
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $task = fetchTaskPostData();
            $sql = sprintf('UPDATE tasks '
                    . 'SET name = "%s", description = "%s", priority = %s, dueDate = "%s" '
                    . 'WHERE id = %s AND userId = %s', $task['name'], $task['description'], $task['priority'], $task['dueDate'], $id, $_SESSION['userId']);
            
            mysql_query($sql, $connection);
            
            mysql_close($connection);
            
            redirectTaskListPage();
        }
    }
}

/**
 * Creates a new task
 */
function createTasks() {
    // we check that this is a post request
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // we fetch the tasks data that comes from the user
        $task = fetchTaskPostData();

        $query = sprintf('INSERT INTO tasks(userId, name, description, priority, dueDate)'
                . ' VALUES(%d, "%s", "%s", %s, "%s")', $_SESSION['userId'], $task['name'], $task['description'], $task['priority'], $task['dueDate']);

        $connection = dbConnect();

        mysql_query($query, $connection);    

        mysql_close($connection);

        // redirect to the list's page to see the changed table of tasks
        redirectTaskListPage();
    }
}

/**
 * Delete a task by it's id
 */
function deleteTasks() {    
    // check whether we have the id of the task in the get request
    if (isset($_GET['id'])) {        
        $query = 'DELETE FROM tasks WHERE id = ' . $_GET['id'] . ' AND userId = ' . $_SESSION['userId'];
    
        $connection = dbConnect();

        mysql_query($query, $connection);

        mysql_close($connection);

        // redirect to the list's page to see the changed table of tasks
        redirectTaskListPage();
    }
}



/**
 * Gets all task data from a post request
 * 
 * @return A single task with data filled from the post request
 */
function fetchTaskPostData() {
    return array(
        'id' => isset($_POST['id']) ? $_POST['id'] : 0, // TODO Generate sequent ID
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'priority' => $_POST['priority'],
        'created' => $_POST['created'],
        'dueDate' => $_POST['dueDate'],
    );
}

/**
 * Gets all tasks from the database.
 * 
 * @return An array of tasks
 */
function listTasks() {
    $connection = dbConnect();
    
    $query = 'SELECT * FROM tasks WHERE userId = ' . $_SESSION['userId'];
    $result = mysql_query($query, $connection);
    
    $tasks = array();
    while($task = mysql_fetch_assoc($result)) {
        $tasks[] = $task;
    }
    
    mysql_close($connection);
    
    return $tasks;
}

/**
 * Redirects the user to the index's list page.
 */
function redirectTaskListPage($page = 'tasks') {
    header("Location: /index.php?page=$page");
    exit;
}

function loginUser() {  
    $user = new User();
    $user ->setUsername($_POST['username']);
    $user ->setPassword($_POST['password']);

    $connection = dbConnect();
    $query = "SELECT * FROM users WHERE username = '$user->getUsername()' AND password = '$user->getPassword()'";
    $result = mysql_query($query, $connection);
    $fetchuser = mysql_fetch_object($result);
    
    $_SESSION['userId'] = $fetchuser ->id;
    $_SESSION['username'] = $fetchuser ->username;
    
    mysql_close($connection);
    
    redirectTaskListPage();
}

function logoutUser() {
    session_destroy();
    
    redirectTaskListPage('index');
}

//userLogin();

function dbConnect() {
    $connection = mysql_connect('localhost', 'root', '') or 
            die('Error while connecting to the database!');
    mysql_select_db('todo', $connection) or die('Fail to select DB!');
    
    return $connection;
}

function listIndex() {
    exit;
}

/**
 * Processes all incoming requests
 */
function processRequest() {
    $page = $_GET['page'];
    
    // check whether there is a logged in user. If not, redirect it to the index page
    if (isset($page) && $page != 'index' && $page != 'user' && !isset($_SESSION['userId'])) {
        redirectTaskListPage('index');
    }
    
    $defaultAction = 'list';
    if (isset($_GET['action'])) {
        $action = $_GET['action'];

        $function = $action . ucfirst($page);

        $includeFile = "$page/$action";
    } else {
        $function = $defaultAction . ucfirst($page);

        $includeFile = "$page/$defaultAction";
    }        
    
    $data = $function();
    include "$includeFile.php";
}