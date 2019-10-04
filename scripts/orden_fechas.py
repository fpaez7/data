ruta = "Tablas/final - Recursos_cerrados.csv"
#######################################################
# Fijarse si el ultimo dato hay que agregar el /n o no#
#######################################################
with open(ruta, "r", encoding="utf-8") as file:
    header = file.readline().split(";")
    header_util = list()
    for i in header:
        if "fecha" in i:
            header_util.append(header.index(i))
    data = list()
    print(header_util)
    for line in file:
        l_aux = line.split(";")
        for i in header_util:
            fecha = l_aux[i]
            fecha_n = fecha.strip().split("-")[::-1]
            fecha_n_str = "-".join(fecha_n)
            l_aux[i] = fecha_n_str
        data.append(l_aux)


with open(ruta, "w", encoding="utf-8") as file:
    file.write(";".join(header))
    for line in data:
        file.write(";".join(line) + "\n")
    