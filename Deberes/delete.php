<?php require('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page - Delete</title>
</head>
<body>
    <?php
    //  $query = 'DELETE FROM movie 
    //  WHERE
    //      movie_id = ' . $_GET['id'];
    if(isset($_GET['data'])):
        if( ($_GET['data'] == 'movie') || ($_GET['data'] == 'people')):
            //I'm a movie or persona AND I'm an action
            $table = $_GET['data'];
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
                            //THIS ID EXIST                                                
                            switch($_GET['data']):
                                //I'M A MOVIE
                                case 'movie':
                                    echo 'movie';
                                    break;
                                //I'M A PERSON
                                case 'people':
                                    echo 'people';
                                    break;                             
                            endswitch;                    
                        endif;
                    else:
                        errorFound();
                    endif;
                else:
                    errorFound();
                endif;
        else:
            errorFound();
        endif;
    else:
        errorFound();
    endif;
    ?>

    <br/>
    <a href="<?php echo URL_RETURN; ?>">Return to administration panel</a>
    
</body>
</html>

<?php
// if (!isset($_GET['do']) || $_GET['do'] != 1) {
//     switch ($_GET['type']) {
//     case 'movie':
//         echo 'Are you sure you want to delete this movie?<br/>';
//         break;
//     case 'people':
//         echo 'Are you sure you want to delete this person?<br/>';
//         break;
//     } 
//     echo '<a href="' . $_SERVER['REQUEST_URI'] . '&do=1">yes</a> '; 
//     echo 'or <a href="admin.php">no</a>';
// } else {
//     switch ($_GET['type']) {
//     case 'people':
//         $query = 'UPDATE movie SET
//                 movie_leadactor = 0 
//             WHERE
//                 movie_leadactor = ' . $_GET['id'];
//         $result = mysqli_query($db, $query) or die(mysqli_error($db));

//         $query = 'DELETE FROM people 
//             WHERE
//                 people_id = ' . $_GET['id'];
//         $result = mysqli_query($db, $query) or die(mysqli_error($db));
// 
// <p style="text-align: center;">Your person has been deleted.
// <a href="movie_index.php">Return to Index</a></p>

//         break;
//     case 'movie':
//         $query = 'DELETE FROM movie 
//             WHERE
//                 movie_id = ' . $_GET['id'];
//         $result = mysqli_query($db, $query) or die(mysqli_error($db));
// <p style="text-align: center;">Your movie has been deleted.
// <a href="movie_index.php">Return to Index</a></p>

//         break;
//     }
// }
?>