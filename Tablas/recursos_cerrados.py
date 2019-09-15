ruta = "Tablas/Tablas nuevas/final - Recursos.csv"
ruta_1 = "Tablas/Tablas nuevas/final_2 - Recursos.csv"
ruta_2 = "Tablas/Tablas nuevas/final - recursos_cerrados.csv"

with open(ruta, "r", encoding="utf-8") as file:
    header = file.readline().strip().split(";")
    header[0] = "Rid"
    ubi_status = header.index("status")
    ubi_rid = header.index(("Rid"))
    ubi_fecha_dict = header.index("fecha_dictamen")
    
    rec_cerrados = list()
    rec = list()
    for line in file:
        l_aux = line.strip().split(";")
        rec.append(l_aux[:len(l_aux) - 2])

        if l_aux[ubi_status] != "en tramite":
            l_aux_2 = [l_aux[ubi_rid], l_aux[ubi_status], 
            l_aux[ubi_fecha_dict]]
            rec_cerrados.append(l_aux_2)

"""
with open(ruta_1, "w", encoding="utf-8") as file:
    file.write(";".join(header) + "\n")

    for elem in rec:
        line = ";".join(map(str, elem))
        if rec.index(elem) < len(rec) - 1:
            file.write(line + "\n")
        else:
            file.write(line)
"""
with open(ruta_2, "w", encoding="utf-8") as file:
    file.write("Rid;status;fecha_dictamen\n")
    
    for elem in rec_cerrados:
        line = ";".join(map(str, elem))
        if rec_cerrados.index(elem) < len(rec_cerrados) - 1:
            file.write(line + "\n")
        else:
            file.write(line)