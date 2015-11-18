<html>
    <head>
        <title>Jordi Bravo Mendez</title>
    </head>
    <body>
         <h2>Ficheros</h2>
        <ul>
           
        <?php
            
            $ficheros = scandir("./");
            $ficheros_no = ["script.sh","crud.php","..",".","index.php","logs.txt"]; //Archivos para no mostrar
            foreach($ficheros as $fichero){
                if(array_search($fichero,$ficheros_no)===false){ //Si el fichero no está dentro del array, lo printamos.
                    echo '<li>'.$fichero.' </li>';
                }
                
            }

        ?>
       </ul>
    </body>
    
</html>
