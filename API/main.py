from flask import Flask, render_template, request, abort, json
from pymongo import MongoClient
import pandas as pd
import os


# El cliente se levanta en la URL de la wiki
URL = "mongodb://grupo39:grupo39@gray.ing.puc.cl/grupo39"
client = MongoClient(URL)
mydb = client["grupo39"]

msges = mydb["messages"]
users = mydb["usuarios"]

# Iniciamos la aplicación de flask
app = Flask(__name__)

@app.route("/")
def home():
    return "<h1>Bienvenidos a la API</h1>"

# Retorna todos los mensajes
@app.route("/messages/content-search", methods=["GET"])
def show_messages():
    data = request.get_json()
    q = ""
    if data:
        required = data.get("required", False)
        desired = data.get("desired", False)
        forbidden = data.get("forbidden", False)

        if required or desired or forbidden:
            if required:
                for i in required:
                    q += "\\" + '"' + f"\\{i}\\ "

            if desired:
                for i in desired:
                    q += i + " "
            
            if forbidden:
                for i in forbidden:
                    q += "-" + i + " "
            print(f"request: {q}")

            msges.create_index([('message', 'text')])
            output = list()
        for i in msges.find({"$text": {"$search": q}}):
            output.append({"message": i["message"]})

    else:
        output = []
        for q in msges.find():
            output.append({"message": q["message"]})


    return json.jsonify({"result": output})

    



@app.route("/messages/<mail>", methods=["GET"])
def show_mail_info(mail):

    q = users.find_one({"usucorreo": mail})
    output = {"usuid": q["usuid"], "usunombre": q["usunombre"], 
             "usufecha_nac": q["usufecha_nac"], "usunacionalidad": q["usunacionalidad"],
             "usucorreo": q["usucorreo"]}
    return json.jsonify({"result": output})



@app.route("/users")
def get_users():
    # Omitir el _id porque no es json serializable
    resultados = ['Pedro', 'Juan', 'Diego']
    return json.jsonify(resultados)

@app.route("/users", methods=['POST'])
def create_user():
    '''
    Crea un nuevo usuario en la base de datos
    Se  necesitan todos los atributos de model, a excepcion de _id
    '''
    return json.jsonify({'success': True, 'message': 'Usuario con id 1 creado'})

@app.route("/test")
def test():
    # Obtener un parámero de la URL
    param = request.args.get('name', False)
    print("URL param:", param)

    # Obtener un header
    param2 = request.headers.get('name', False)
    print("Header:", param2)

    # Obtener el body
    body = request.data
    print("Body:", body)

    return "OK"

if __name__ == "__main__":
    app.run()
