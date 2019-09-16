
archivo = "Recursos"
ruta = f"Tablas/final - {archivo}.csv"
ruta_n = f"Tablas/final_2 - {archivo}.csv"

with open(ruta, "r", encoding="utf-8") as file:
    header = file.readline()
    data = list()
    i = 0
    for line in file:
        l_aux = line.strip().split(";")
        l_aux[0] = i
        data.append(l_aux)
        i += 1
    
with open(ruta_n, "w", encoding="utf-8") as file:
    file.write(header)
    for elem in data:
        line = ";".join(map(str, elem))
        if data.index(elem) != (len(data) - 1): 
            file.write(line + "\n")
        else:
            file.write(line)

