# Taller-01 PHP PDO

1. clonar 
```
git clone https://github.com/jairoCO10/php-docker.git
```
2. levantar docker 
you have to have docker
```
docker compose up --build
```
3. configurar el Dbconection a conveniencia `api/settings/Dbconection.php`
```
private $host = "192.168.20.121"; //YOUR IP ADDRESS - dokcer ifconfig - xampp <localhost>.
private $dbname = "dbname"; // aquí debes reemplazar "dbname" con el nombre de tu base de datos
private $user = "root";
private $password = "test";
```
4. Cargar el `bdname.sql` en la base de datos, esta en la ruta `api/SQL/dbname.sql` 

5. Si usa xampp basta con arratrar la carpeta taller-01 al xampp para correrlo e importar la base de datos del punto 4.

---

## Pruebas de uso

1. GET PERSONAS
![GET PERSONAS](./public/imgs/getp.jpeg)

2. POST PERSONA
![POST1 PERSONAS](./public/imgs/pre-post.jpeg)
![POST2 PERSONAS](./public/imgs/postp.jpeg)
![POST3 PERSONAS](./public/imgs/getrp.jpeg)

3. PUT PERSONA
![PUT1 PERSONAS](./public/imgs/put_1.jpeg)
![PUT2 PERSONAS](./public/imgs/put_2.jpeg)
![PUT3 PERSONAS](./public/imgs/put_3.jpeg)
![PUT3 PERSONAS](./public/imgs/put_4.jpeg)


4. DELETE PERSONA
![DELETE1 PERSONAS](./public/imgs/del.jpeg)
![DELETE2 PERSONAS](./public/imgs/del_confir.jpeg)
![DELETE3 PERSONAS](./public/imgs/res_end.jpeg)

5. BASE DE DATOS
![DB PERSONAS](./public/imgs/db.jpg)
![DBG PERSONAS](./public/imgs/db_tb_genero.jpg)
![DBP PERSONAS](./public/imgs/db_tb_personas.jpeg)
![DBPR PERSONAS](./public/imgs/db_tb_programa.jpeg)

