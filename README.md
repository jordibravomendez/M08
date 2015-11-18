#PUTS
curl -X PUT -d "HOLA1"  http://localhost/crud/crud.php/?id=1
curl -X PUT -d "HOLA2"  http://localhost/crud/crud.php/?id=2
curl -X PUT -d "HOLA3"  http://localhost/crud/crud.php/?id=3
curl -X PUT -d "HOLA4"  http://localhost/crud/crud.php/?id=4
# -X es la accion que vamos a hacer(PUT,GET,DELETE,POST)
# -d sera el contenido del body que tendra el archivo creado(put) o modificado(post)
#url que se le pasa a tu programa para darle informacion. En este caso le pasamos a tu programa un id que sera el nombre del archivo.

#GETS
curl -X GET http://localhost/crud/crud.php/?id=1
curl -X GET http://localhost/crud/crud.php/?id=2
curl -X GET http://localhost/crud/crud.php/?id=3
curl -X GET http://localhost/crud/crud.php/?id=4

#POST
curl -X POST -d "Pepsicola1" http://localhost/crud/crud.php/?id=1
curl -X POST -d "Pepsicola2" http://localhost/crud/crud.php/?id=2
curl -X POST -d "Pepsicola3" http://localhost/crud/crud.php/?id=3
curl -X POST -d "Pepsicola4" http://localhost/crud/crud.php/?id=4

#GET
curl -X GET http://localhost/crud/crud.php/?id=1
curl -X GET http://localhost/crud/crud.php/?id=2
curl -X GET http://localhost/crud/crud.php/?id=3
curl -X GET http://localhost/crud/crud.php/?id=4

#DELETE
curl -X DELETE http://localhost/crud/crud.php/?id=1
curl -X DELETE http://localhost/crud/crud.php/?id=2
curl -X DELETE http://localhost/crud/crud.php/?id=3
curl -X DELETE http://localhost/crud/crud.php/?id=4
