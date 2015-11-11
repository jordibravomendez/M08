<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET'){ //Si nos entra un get - miramos si el fichero existe, si existe lo enseñamos, si no, le indicamos que no existe.

    if(file_exists("./".$_GET['id'].".txt")){ //Si existe el fichero se lo indicamos. 
        echo file_get_contents("./".$_GET['id'].".txt");
        
        //Metemos en el fichero logs.txt el mensaje deseado(segundo parametro) y ponemos APPEND para que no borre lo que hay, si no que añada lo que queramos al final del fichero.
         file_put_contents("./logs.txt","GET | ".$_GET["id"]." | contenido:".file_get_contents("./".$_GET['id'].".txt")." | ".date("D M j G:i:s T Y")."\n",FILE_APPEND); //LOGS con fecha
    }else{
        echo 'No se puede mostrar por que no existe';
    }
   
   
} else if ($_SERVER['REQUEST_METHOD'] == 'POST'){ //Si nos entra un post - actualiza, si no existe el fichero, no te deja actualizarlo.
    
    if(file_exists("./".$_GET['id'].".txt")){ //Si el fichero existe, lo actualizaremos.
        file_put_contents("./logs.txt","POST | ".$_GET["id"]." | ".date("D M j G:i:s T Y")." \n",FILE_APPEND); //LOGS con fecha
    
        //Crear archivo
        file_put_contents($_GET['id'].".txt",file_get_contents("php://input")); //File get contents coge el valor que nos entre por el -d del curl.
        //File put crea el archivo. El primer parametro será el archivo creado por ejemplo 1.txt y en el siguiente cogemos lo que nos entra por el parametro -d del curl para meterlo como cuerpo de ese fichero.

    }else{
        echo 'No existe el fichero, por lo tanto no se puede actualizar!';
    }
      
    
} else if ($_SERVER['REQUEST_METHOD'] == 'PUT'){ //Si nos entra un put - creamos un archivo y si existe, no lo dejamos crear.

    if(!file_exists("./".$_GET['id'].".txt")){ //Si el fichero no existe, lo dejamos crear.
        //Crear archivo
         file_put_contents($_GET['id'].".txt",file_get_contents("php://input"));
        //File put crea el archivo. El primer parametro será el archivo creado por ejemplo 1.txt y en el siguiente cogemos lo que nos entra por el parametro -d del curl para meterlo como cuerpo de ese fichero.
    
        file_put_contents("./logs.txt","PUT | ".$_GET["id"]." | ".date("D M j G:i:s T Y")."\n",FILE_APPEND); //LOGS con fecha
    }else{
        echo 'El fichero ya existe, no se puede crear de nuevo';
    }
    
    
    
} else if ($_SERVER['REQUEST_METHOD'] == 'DELETE'){ //Si nos entra un delete - miramos si el fichero existe para borrarlo, si existe lo borramos. Si no, se lo indicamos.

    if(file_exists("./".$_GET['id'].".txt")){ //Si existe lo borramos.
        
        unlink("./".$_GET['id'].".txt"); //Con el getid+.txt le indicamos que fichero tiene que borrar.
        
        file_put_contents("./logs.txt","DELETE | ".$_GET["id"]." | ".date("D M j G:i:s T Y")."\n",FILE_APPEND); //LOGS con fecha
    }else{ //Si no, se lo indicamos.
        echo 'No existe el fichero. No se puede borrar...';
    }
     
     
     
} else {
    file_put_contents("./logs.txt","ERROR | ".$_GET["id"]." | ".date("D M j G:i:s T Y")."\n",FILE_APPEND); //LOGS con fecha
    
    $retval = array('estat' => 'ERROR');
}
?>
