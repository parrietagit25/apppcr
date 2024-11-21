import pandas as pd
from sqlalchemy import create_engine

mysql_config = {
    'user': 'root',
    'password': '',
    'host': 'localhost',
    'database': 'apppcr'
}

file_path = 'apppcr/excel/code.xlsx'
df = pd.read_excel(file_path)

df_prepared = df.rename(columns={"Código": "code"})
df_prepared["pass"] = "123456"  
df_prepared["stat"] = 1         

def upload_to_mysql(dataframe, table_name, config):
    engine = create_engine(f"mysql+mysqlconnector://{config['user']}:{config['password']}@{config['host']}/{config['database']}")
    dataframe.to_sql(name=table_name, con=engine, if_exists='append', index=False)

try:
    upload_to_mysql(df_prepared, 'users', mysql_config)
    print("Datos cargados exitosamente.")
except Exception as e:
    print(f"Error al cargar los datos: {e}")
