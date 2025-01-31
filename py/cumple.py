import pandas as pd
from sqlalchemy import create_engine

mysql_config = {
    'user': 'root',
    'password': '',
    'host': 'localhost',
    'database': 'apppcr'
}

file_path = 'apppcr/excel/cumple.xlsx'
df = pd.read_excel(file_path)

month_mapping = {
    "Enero": "01",
    "Febrero": "02",
    "Marzo": "03",
    "Abril": "04",
    "Mayo": "05",
    "Junio": "06",
    "Julio": "07",
    "Agosto": "08",
    "Septiembre": "09",
    "Octubre": "10",
    "Noviembre": "11",
    "Diciembre": "12",
}

def convert_to_date_manual(text_date):
    try:
        day, month = text_date.split()
        month_num = month_mapping[month.capitalize()]
        return f"{month_num}-{int(day):02d}"
    except (ValueError, KeyError):
        return None

df['fecha_cumpleanios_numerica'] = df['fecha cumpleanios'].apply(convert_to_date_manual)
df = df.rename(columns={
    'fecha cumpleanios': 'fecha_cumpleanios_texto',
    'codigo': 'codigo'
})

def upload_to_mysql(dataframe, table_name, config):
    engine = create_engine(f"mysql+mysqlconnector://{config['user']}:{config['password']}@{config['host']}/{config['database']}")
    dataframe.to_sql(name=table_name, con=engine, if_exists='append', index=False)

try:
    upload_to_mysql(df[['codigo', 'fecha_cumpleanios_texto', 'fecha_cumpleanios_numerica']], 'tabla_cumpleanos', mysql_config)
    print("Datos cargados exitosamente.")
except Exception as e:
    print(f"Error al cargar los datos: {e}")
