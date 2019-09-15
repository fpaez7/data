import openpyxl
ruta_proyecto_xcl = "Excel/datos_proyectos_excel.xlsx"
ruta_proyecto_csv = "Tablas/Tablas nuevas/final - Proyectos.csv"
ruta_socios_csv = "Tablas/Tablas nuevas/final - Socios.csv"

proyecto_wb = openpyxl.load_workbook(ruta_proyecto_xcl)
p_ws = proyecto_wb.active


datos_proyectos = dict() # {nombre: Pid}

with open(ruta_proyecto_csv, "r", encoding="utf-8") as file:
    header = file.readline().strip().split(";")
    header_util = [header.index("Pid"), header.index("nombre")]

    for line in file:
        l_aux = line.strip().split(";")
        datos_proyectos[l_aux[header_util[1]]] =  l_aux[header_util[0]]
      
datos_socios = dict() # {nombre_apellid: Sid}
with open(ruta_socios_csv, "r", encoding="utf-8") as file:
    header = file.readline().strip().split(";")
    header_util = [header.index("Sid"), header.index("nombre"), header.index("apellido")]
    for line in file:
        l_aux = line.strip().split(";")
        t_nombre_apellido = (l_aux[header_util[1]], l_aux[header_util[2]])
        nombre_apellido = " ".join(t_nombre_apellido)
        datos_socios[nombre_apellido] = l_aux[header_util[0]]


tabla_socio_proyecto = []
i = 2
while i < p_ws.max_row:
    nombre_proy = p_ws[f"B{i}"].value
    socios_proy = p_ws[f"K{i}"].value.split(",")
    pid_proyecto = datos_proyectos[nombre_proy]
    for socio in socios_proy:
        tupla = (datos_socios[socio], pid_proyecto)
        tabla_socio_proyecto.append(tupla)
    i += 1

ruta_socio_proyecto_csv = "Tablas/Tablas nuevas/final-socio_proyecto.csv"

with open(ruta_socio_proyecto_csv, "w", encoding="utf-8") as file:
    file.write("Sid;Pid\n")
    for elem in tabla_socio_proyecto:
        line = ";".join(elem)
        if tabla_socio_proyecto.index(elem) < len(tabla_socio_proyecto) - 1:
            file.write(line + "\n")
        else:
            file.write(line)


