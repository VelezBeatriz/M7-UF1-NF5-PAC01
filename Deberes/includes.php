<?php
//Error's quote
$error = 'Error de Connexión número (' . $bbdd->connect_errno . ') ' . $bbdd->connect_error;

 //This function execute a query
 function executeQuery($query){
    //Call vars
    global $bbdd;
    global $error;

    //Execute query
    $data = @$bbdd->query($query) or die($error);
}
//This function extract Data
function extractData($query){

     //Call vars
    global $bbdd;
    global $error;

    //Execute query and reset
    $data = @$bbdd->query($query) or die($error);
    $data->data_seek(0);

    //Return data
    return $data;
}

//This function retunr $_GET['action']
function action(){
    if( ($_GET['action'] == 'add') || ($_GET['action'] == 'edit')):
        echo $_GET['action'];

    else:
        echo "Sorry, you cannot access to this page...";
    endif;
    
}
?>