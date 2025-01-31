import pandas as pd
from sqlalchemy import create_engine

mysql_config = {
    'user': 'root',
    'password': '',
    'host': 'localhost',
    'database': 'apppcr'
}

def upload_to_mysql(dataframe, table_name, config):
    engine = create_engine(f"mysql+mysqlconnector://{config['user']}:{config['password']}@{config['host']}/{config['database']}")
    dataframe.to_sql(name=table_name, con=engine, if_exists='append', index=False)

file_path = 'apppcr/excel/REP_04.xlsx'
df = pd.read_excel(file_path)

df_to_insert = df.rename(columns={
    "Código": "codigo",
    "Cédula": "cedula",
    "Nombre": "nombre",
    "Cargo Desempeñado": "cargo",
    "Ingreso": "fecha_ingreso",
    "Departamento": "departamento"
})

df_to_insert["stat"] = 1  

try:
    upload_to_mysql(df_to_insert, 'col_datos_generales', mysql_config)
    print("Datos cargados exitosamente.")
except Exception as e:
    print(f"Error al subir los datos: {e}")
