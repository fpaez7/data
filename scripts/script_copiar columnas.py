ruta_1 = "Tablas/final - Región_Comuna.csv"
ruta_2 = "Tablas/final - Proyectos.csv"
ruta_3 = "Tablas/finalfinal - Proyectos.csv"

data_1 = list()
with open(ruta_1, "r", encoding="utf-8") as file:
    header_1 = file.readline()
    for line in file:
        l_aux = line.strip().split(";")
        data_1.append((l_aux[0], l_aux[1]))

data_2 = list()
with open(ruta_2, "r", encoding="utf-8") as file:
    header_2 = file.readline()
    for line in file:
        l_aux = line.strip().split(";")
        data_2.append(l_aux)

with open(ruta_3, "w", encoding="utf-8") as file:
    file.write(header_2)
    i = 0
    while i < len(data_2):
        lat, lon = data_1[i]
        data_2[i][3] = lat
        data_2[i][4] = lon
        line = ";".join(data_2[i])
        if i < len(data_2) - 1:
            file.write(line + "\n")
        else:
            file.write(line)
        i += 1