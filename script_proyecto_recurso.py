import openpyxl

ruta_recurso_xcl = "Excel/datos_recursos_excel.xlsx"
ruta_proyectos_csv = "Tablas/Tablas nuevas/final - Proyectos.csv"
ruta_proyecto_recurso = "Tablas/Tablas nuevas/final-proyecto_recurso.csv"

recursos_wb = openpyxl.load_workbook(ruta_recurso_xcl)
r_ws = recursos_wb.active

dicc_rec = dict()
i = 2
while i < r_ws.max_row:
    nombre_recurso = r_ws[f"B{i}"].value[15:]
    dicc_rec[nombre_recurso] = i - 2
    i += 1
    print(i - 2)

tabla_proy_rec = list() #[(Pid, Rid)]
print("Lei el excel")
with open(ruta_proyectos_csv, "r", encoding="utf-8") as file:
    header = file.readline().strip().split(";")
    header_util = [header.index("Pid"), header.index("nombre")]

    for line in file:
        l_aux = line.strip().split(";")
        nombre = l_aux[header_util[1]]
        Pid = l_aux[header_util[0]]
        tabla_proy_rec.append((Pid, dicc_rec[nombre]))
        print(tabla_proy_rec)
        break

    



