import time
import os
datos = dict()


for archivo in os.listdir("small"):
    print(archivo)

movies = []
archivo = "movies.csv"
with open (f"small/{archivo}") as file:
    file.__next__()
    for line in file:
        lista = line.rstrip().split(",")
        movies.append((int(lista[0]),lista[1],lista[2]))

usuarios = []
archivo = "usuarios.csv"
with open (f"small/{archivo}") as file:
    file.__next__()
    for line in file:
        lista = line.rstrip().split(",")
        usuarios.append((int(lista[0]),lista[1]))

favoritos = []
archivo = "favoritos.csv"
with open (f"small/{archivo}") as file:
    file.__next__()
    for line in file:
        lista = line.rstrip().split(",")
        favoritos.append((int(lista[0]),int(lista[1])))

def nested_loop_join(usuarios,movies,favoritos):
    j=[]
    for usuario in usuarios:
        for favorito in favoritos:
            for movie in movies:
                if usuario[0] == favorito[0]  and favorito[1]== movie[0]:
                    j.append((usuario[1],favorito[0],movie[0],movie[1]))
    return j
time_init = time.time()
retornado = nested_loop_join(usuarios,movies,favoritos)
time_fin = time.time()
print(time_fin - time_init)
