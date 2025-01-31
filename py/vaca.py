import pandas as pd
from sqlalchemy import create_engine

mysql_config = {
    'user': 'root',
    'password': '',
    'host': 'localhost',
    'database': 'apppcr'
}

file_path = 'apppcr/excel/vacaciones.xlsx'
df = pd.read_excel(file_path, skiprows=3, usecols=[0, 1, 2, 3, 4, 5, 6], names=[
    "fecha_ingreso", "vac_pag_hasta", "proximas_vac", "vencidas", "dias_pendientes", "codigo", "nombre"
])

date_columns = ["fecha_ingreso", "vac_pag_hasta", "proximas_vac"]
for col in date_columns:
    df[col] = pd.to_datetime(df[col], errors="coerce")

df["dias_pendientes"] = pd.to_numeric(df["dias_pendientes"], errors="coerce")

df = df.dropna(subset=["codigo", "nombre", "fecha_ingreso"])

def upload_to_mysql(dataframe, table_name, config):
    engine = create_engine(f"mysql+mysqlconnector://{config['user']}:{config['password']}@{config['host']}/{config['database']}")
    dataframe.to_sql(name=table_name, con=engine, if_exists='append', index=False)

try:
    upload_to_mysql(df, 'col_vacaciones', mysql_config)
    print("Datos cargados exitosamente.")
except Exception as e:
    print(f"Error al cargar los datos: {e}")
