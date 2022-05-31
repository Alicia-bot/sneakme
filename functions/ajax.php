<?php 

include('database.php');

if(isset($_GET['action'])){
    switch ($_GET['action']) {
        case 'welcome':
            $request_string = "SELECT welcome_message FROM bot";
            $request = $db->prepare($request_string);
            $request->execute();
            $row = $request->fetch(PDO::FETCH_ASSOC);
            header('content-type:application/json');
            if($row && $row['welcome_message'] != null) echo(json_encode($row));
        break;

        case 'farewell':
            $request_string = "SELECT farewell_message FROM bot";
            $request = $db->prepare($request_string);
            $request->execute();
            $row = $request->fetch(PDO::FETCH_ASSOC);
            header('content-type:application/json');
            if($row && $row['farewell_message']) echo(json_encode($row));
        break;

        case 'image':
            $request_string = "SELECT image FROM bot";
            $request = $db->prepare($request_string);
            $request->execute();
            $row = $request->fetch(PDO::FETCH_ASSOC);
            header('content-type:application/json');
            if($row && $row['image']) echo(json_encode($row));
        break;
        
        default:
            # code...
        break;
    }
}


?>