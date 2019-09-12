Estos son los datos con los que van a trabajar durante el proyecto. Los archivos pueden abrirse en excel (pero ojo, no guardarlos en excel por que se pierde el formato!). 

Acá hay material que describe el comando usado comunmente para importar los datos: 
https://stackoverflow.com/questions/2987433/how-to-import-csv-file-data-into-a-postgresql-table

Sin embargo, hay una serie de procesamientos que deben hacer antes. Por ejemplo: 

- No necesitan todos los datos. Dependiendo si son grupo par o impar, solo les va a interesar una porción de esto. 

- Los datos están en español, las bases de datos asumen inglés. Esto significa, al menos, eliminar acentos, y ojo con los números decimales. 

- Las tablas no están normalizadas

- Algunos atributos tienen mucha información, hay que transformar eso a varias tuplas


Explicación de las tablas. 
****
Socios: 
nombre -> el nombre de los socios </br>
apellido </br>
nacionalidad

****

Recursos
número -> un id del recurso de protección </br>
nombre </br>
causa contaminante </br>
área influencia (kms) </br>
descripción </br>
fecha apertura </br>
región de tramitación </br>
comuna de tramitación </br>
status </br>
fecha dictamen -> si status es en trámite, la fecha es NA. Si status es aprobado o rechazado, este campo contiene la fecha en que se dictaminó ese status </br>
ONGs que participan -> Son los nombres de las ONGs, separadas por un / (es decir, en este campo están todas las ONGs que participaron de ese recurso). 

****

Proyectos
tipo -> 1 es mina, 2 es electrica, 3 es vertedero </br>
nombre </br>
latitud </br>
longitud </br>
región </br>
comuna </br>
fecha apertura </br>
operativo -> si/no (por ahora todas están operativas) </br>
mineral -> el tipo de mineral si el proyecto es mina, si no tiene un - </br>
tipo generación -> el tipo de central si el proyecto es central, si no tiene un - </br>
socios -> socios, separados por coma </br>

****

Movilizaciones
ONG -> la ONG que organiza </br>
proyecto -> el proyecto que se busca cerrar </br>
prespuesto </br>
tipo </br>
fecha -> si es marcha es la fecha de la marcha, si es redes sociales, la fecha de inicio </br>
n_esperado_personas -> solo para marchas, si no es NA </br>
lugar -> solo para marchas, si no es NA </br>
tipo_contenido -> solo para redes sociales, si no es NA </br>
duración(días) -> solo para redes sociales, si no es NA

****

ONGs

nombre </br>
país </br>
descripción </br>

