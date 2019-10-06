def movimiento_aleatorio (pos,tablero):
    #segun la pocicion del caballo calculo sus posibles movimientos
    #actualizo la pocicion del caballo
    return pos #retorno su nueva posicion

def simulacion(N):
    #aqui puedes almacenar informacion de cada casilla
    columna1 = [0,0,0,0,0,0,0,0]
    columna2 = [0,0,0,0,0,0,0,0]
    tablero = [columna1,columna2]#falran las demas
    f = 0 #fila inicial de tu caballo
    c = 0 # columna inicial del caballo
    pos = (f,c) #pongo el caballo
    for i in range(N):
        pos= movimiento_aleatorio(pos,tablero)
        print(pos)
    return pos

for i in range (CANTIDAD_EXPERIMENTOS):
    casos_favorables = 0
    if simulacion(1) == (8,8):
         #si la posicion final fue la esquina opuesta
         casos_favorables += 1
