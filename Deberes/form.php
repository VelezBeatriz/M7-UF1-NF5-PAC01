<?php require('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <?php 
    if(isset($_GET['action'])):
        if( ($_GET['action'] == 'add') || ($_GET['action'] == 'edit')):
            $action = ucwords($_GET['action']);
    
        else:
           $action = 'Not Found';
        endif;
    else:
        $action = 'Not Found';
    endif;
    ?>
    <title>Page - <?php echo $action?></title>
</head>
<body>
    <?php
    //CHECK ACTION
    if(isset($_GET['action'])):
        if( ($_GET['action'] == 'add') || ($_GET['action'] == 'edit')):
            //CHECK DATA
            if(isset($_GET['data'])):
                if( ($_GET['data'] == 'movie') || ($_GET['data'] == 'people')):
                    //I'm a movie or persona AND I'm an action
                    $table = $_GET['data'];
                    switch ($_GET['action']):
                        case 'add':
                            //START ACTION - ADD

                            //END ACTION - ADD
                            break;
                        case 'edit':
                            //START ACTION - EDIT
                                //CHECK IF ID EXIST
                                    if(isset($_GET['id'])):
                                        if(is_numeric($_GET['id'])):
                                            //CHECK IF ID IS INTO DATA
                                            $id = $_GET['id'];
                                            $id_name = ($table === 'movie') ? 'movie_id' : 'people_id';
                                            $query = "SELECT * FROM  $table WHERE $id_name = $id ";
                                            $data = extractData($query);
                                            
                                            if($data->num_rows == 0):
                                                echo "<p>Sorry, these data don't exist...</p>";
                                            else:
                                                while( $row = $data->fetch_assoc()):
                                                    //THIS ID EXIST
                                                    extract($row);
                                                    echo '<pre>';
                                                    var_dump($row);
                                                    echo '</pre>';
                                                    //I'M A MOVIE
                                                    //I'M A PERSON
                                                endwhile;
                                            endif;
                                        else:
                                            echo "<p>Sorry, you cannot access to this page...</p>";
                                        endif;
                                    else:
                                        echo "<p>Sorry, you cannot access to this page...</p>";
                                    endif;

                            //END ACTION - EDIT
                            break;
                        default:
                            echo "<p>Sorry, you cannot access to this page...</p>";
                    endswitch;

                else:
                    echo "<p>Sorry, you cannot access to this page...</p>";
                endif;
            else:
                echo "<p>Sorry, you cannot access to this page...</p>";
            endif;



            
    
        else:
            echo "<p>Sorry, you cannot access to this page...</p>";
        endif;  
    else:
        echo "<p>Sorry, you cannot access to this page...</p>";
    endif;
  
    // data=people&action=add


    ?>
    <a href="<?php echo URL_RETURN; ?>">Return to administration panel</a>

    
</body>
</html>