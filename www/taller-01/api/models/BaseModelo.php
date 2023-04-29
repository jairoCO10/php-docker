/*

SELECT Person.identificacion, Person.name, Genero.genero, Programa.programa
from Person 
INNER JOIN Genero on Genero.id = Person.genero
INNER JOIN Programa on Programa.id = Person.programa;

*/