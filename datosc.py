import pandas as pd
from sqlalchemy import create_engine

mysql_config = {
    'user': 'root',
    'password': '',
    'host': 'localhost',
    'database': 'apppcr'
}

file_path = 'apppcr/excel/PLEMP.xlsx'
df = pd.read_excel(file_path)

columns_to_select = [
    "CCODEMP", "CCODEMPV", "NNUMEMP", "CCODHOR", "CCODTAR", "CNOMBRE", "CAPELLIDO",
    "CCARGO", "DNAC", "CCEDULA", "CSEXO", "CESTCIVIL", "CEMAIL", "CTELEFONO", "CDIR1",
    "DINGRESO", "NDIASLIC", "LVACAADEL", "DULTDIAPAG", "MOBSERVA"
]
df_filtered = df[columns_to_select]

df_filtered.columns = [
    "codigo_empleado", "codigo_empleado_v", "num_empleado", "cod_horario", "cod_tarjeta",
    "nombre", "apellido", "cargo", "fecha_nacimiento", "cedula", "sexo", "estado_civil",
    "email", "telefono", "direccion", "fecha_ingreso", "dias_licencia", "dias_vacaciones",
    "ultimo_pago", "observaciones"
]

date_columns = ["fecha_nacimiento", "fecha_ingreso", "ultimo_pago"]
for col in date_columns:
    df_filtered[col] = pd.to_datetime(df_filtered[col], errors="coerce")

def upload_to_mysql(dataframe, table_name, config):
    engine = create_engine(f"mysql+mysqlconnector://{config['user']}:{config['password']}@{config['host']}/{config['database']}")
    dataframe.to_sql(name=table_name, con=engine, if_exists='append', index=False)

try:
    upload_to_mysql(df_filtered, 'col_datos_generales_completos', mysql_config)
    print("Datos cargados exitosamente.")
except Exception as e:
    print(f"Error al cargar los datos: {e}")
