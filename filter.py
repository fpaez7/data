import re
from unicodedata import normalize
import ctypes
def get_id (palabra):
    return ctypes.c_size_t(hash(palabra)).value

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
Sacar_tildes("Datos Proyecto - Recursos.csv")
