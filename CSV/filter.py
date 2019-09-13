import re
from unicodedata import normalize
import os
import math

def get_id (s):
    return int.from_bytes(s.encode(), 'little')

def from_id (n):
    return n.to_bytes(math.ceil(n.bit_length() / 8), 'little').decode()

def Sacar_tildes (archivo):
    j= archivo.split(" - ")
    f = open("st - "+j[1], "w")
    with open(archivo) as file:
        for line in file:
            s = line
            s = re.sub(
            r"([^n\u0300-\u036f]|n(?!\u0303(?![\u0300-\u036f])))[\u0300-\u036f]+", r"\1",
            normalize( "NFD", s), 0, re.I
            )
            s = normalize( 'NFC', s)
            f.write(s)
    file.close()
    f.close()
def proyectos ():
    archivo = "st - sc - Proyectos.csv"
    j= archivo.split(" - ")
    f = open("final - "+j[2], "w")
    with open(archivo) as file:
        for line in file:
            s = line.split(";")
            f.write(str(get_id(s[1]))+";"+ ";".join(s[0:7])+";1"+"\n")
def minerales():
    archivo = "st - sc - Proyectos.csv"
    f = open("final - minerales.csv", "w")
    with open(archivo) as file:
        for line in file:
            s = line.split(";")
            if s[0]=="1":
                minerales = s[8].split(",")
                for mineral in minerales:
                    f.write(f"{get_id(s[1])};{mineral}\n")
def generacion():
    archivo = "st - sc - Proyectos.csv"
    f = open("final - generacion.csv", "w")
    with open(archivo) as file:
        for line in file:
            s = line.split(";")
            if s[0]=="2":
                f.write(f"{get_id(s[1])};{s[9]}\n")

def proyecto_socio():
    archivo = "st - sc - Proyectos.csv"
    f = open("final - "+ "proyecto_socio.csv", "w")
    with open(archivo) as file:
        for line in file:
            s = line.split(";")
            socios = s[10].rstrip().split(",")
            for socio in socios:
                f.write(f"{get_id(s[1])};{+get_id(socio)}\n")
def socios():
    archivo = "st - Socios.csv"
    j= archivo.split(" - ")
    f = open("final - "+ j[1], "w")
    with open(archivo) as file:
        for line in file:
            s = line.split(",")
            f.write(str(get_id(" ".join(s[0:2])))+";"+ ";".join(s))
def recurso_proyecto():
    archivo  = "st - sc - Recursos.csv"
    f = open("final - recurso_proyecto.csv", "w")
    with open(archivo) as file:
        for line in file:
            s = line.split(";")
            f.write( f"{s[0]};{get_id(s[1][15::])}\n")
def recursos():
    archivo  = "st - sc - Recursos.csv"
    f = open("final - Recursos.csv", "w")
    with open(archivo) as file:
        for line in file:
            s = line.split(";")
            l= [s[0],s[2],s[3],s[4],s[5],s[6],s[7],s[8],s[9]]
            f.write(";".join(l)+"\n")
def recurso_ong():
    archivo  = "st - sc - Recursos.csv"
    f = open("final - recurso_ong.csv", "w")
    with open(archivo) as file:
        for line in file:
            s = line.split(";")
            ongs = s[10].rstrip().split("/")
            for ong in ongs:
                f.write(f"{s[0]};{get_id(ong)}\n")



#    if archivo.split(" - ")[0]=="Datos Proyecto":
#        Sacar_tildes(archivo)


#### En Recursos manualmente cambiar "nombre" por "Recurso contra nombre"


### manualmente hay que remplazar la primera linea
#socios() #Sid;....
#proyectos() #Pid;....
#proyecto_socio() #Pid;Sid
recursos() #Rid;...
#recurso_proyecto() #Rid;Pid
#recurso_ong() #Rid;Oid
### manualmente hay que agrgar la primera linea
#minerales() # Pid;mineal
#generacion()# Pid;generacion
