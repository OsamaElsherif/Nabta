import sqlalchemy as sql
import pandas as pd
from flask import Flask, make_response
import json

# create the api object
api = Flask(__name__)
# create database engine object "mssql"
server_name = "localhost"
database_name = "NABTA"
driver = "ODBC+Driver+17+for+SQL+Server"
# for Osama
engine = sql.create_engine(f'mssql+pyodbc://sa:Osama_3502@{server_name}/{database_name}?driver={driver}', echo = True)
# for Ahmed
# engine = sql.create_engine(f'mssql+pyodbc://{server_name}/{database_name}?driver={driver}', echo = True)

# create api endpoints
# main endpoint
@api.route('/')
def main():
    return "Welcome in Nabta API, to use it please follow the documintation in our main site"


# select endpoints
# main select endpoint
# attr -> ALL values, or specified
# tablename -> table name to select from
@api.route('/select/<string:attr>/<string:tablename>')
def normalSelect(attr, tablename):
    # sql statement
    # old method without join
    # sql = f"SELECT {attr} FROM [{tablename}]"
    # new method with join
    sql = f"SELECT [{tablename}].{attr}, Department.department_name FROM [{tablename}] INNER JOIN [Department] ON [{tablename}].department_id = Department.[ department_ID]"
    # execute the sql
    result = pd.read_sql(sql, engine).to_json()

    return json.loads(result)

# select endpoint with condition
# fieldname -> the name of the table field
# condition -> the condition that will be used in the sql (= or !=)
# value -> the value to select due to it
@api.route('/select/<string:attr>/<string:tablename>/where/<string:fieldname>/<string:condition>/<string:value>/<string:join>')
def conditionalSelect(attr, tablename, fieldname, condition, value, join):
    # sql statement
    if join == 'true':
        if value.isnumeric():
            # old method
            # sql = f"SELECT {attr} FROM [{tablename}] WHERE {fieldname}{condition}{value}"
            # new method with join
            sql = f"SELECT [{tablename}].{attr}, Department.department_name FROM [{tablename}] INNER JOIN [Department] ON [{tablename}].department_id = Department.[ department_ID] WHERE {fieldname}{condition}{value}"
        else:
            sql = f"SELECT [{tablename}].{attr}, Department.department_name FROM [{tablename}] INNER JOIN [Department] ON [{tablename}].department_id = Department.[ department_ID] WHERE {fieldname}{condition}'{value}'"
        # execute the sql
        result = pd.read_sql(sql, engine).to_json()
    else:
        if value.isnumeric():
            # old method
            # sql = f"SELECT {attr} FROM [{tablename}] WHERE {fieldname}{condition}{value}"
            # new method with join
            sql = f"SELECT {attr} FROM [{tablename}] WHERE {fieldname}{condition}{value}"
        else:
            sql = f"SELECT {attr} FROM [{tablename}] WHERE {fieldname}{condition}'{value}'"
        # execute the sql
        result = pd.read_sql(sql, engine).to_json()

    return json.loads(result)

@api.route('/select/<string:attr>/<string:tablename>/where/<string:fieldname>/<string:condition>/<string:value>/and/<string:fieldname2>/<string:condition2>/<string:value2>')
def twoConditionalSelect(attr, tablename, fieldname, condition, value, fieldname2, condition2, value2):
    # sql statement
    if value.isnumeric():
        if value2.isnumeric():
            sql = f"SELECT {attr} FROM [{tablename}] WHERE {fieldname}{condition}{value} AND {fieldname2}{condition2}{value2}"
        else:
            sql = f"SELECT {attr} FROM [{tablename}] WHERE {fieldname}{condition}{value} AND {fieldname2}{condition2}'{value2}'"
    else:
        if value2.isnumeric():
            sql = f"SELECT {attr} FROM [{tablename}] WHERE {fieldname}{condition}'{value}' AND {fieldname2}{condition2}{value2}"
        else:
            sql = f"SELECT {attr} FROM [{tablename}] WHERE {fieldname}{condition}'{value}' AND {fieldname2}{condition2}'{value2}'"

    # execute the sql
    result = pd.read_sql(sql, engine).to_json()

    return json.loads(result)

# insert endpoints
# values -> inserted vales as it's a sql statment
@api.route('/insert/<string:tablename>/values/<string:values>')
def normalInsert(tablename, values):
    # sql statement
    sql = f"INSERT INTO [{tablename}] VALUES ({values})"
    # execute the sql
    engine.connect()
    engine.execute(sql)

    return '', 200


# update statment
@api.route('/update/<string:tablename>/set/<string:field>/<string:values>/where/<string:fieldname>/<string:condition>/<string:value>')
def normalUpdate(tablename, field, values, fieldname, condition, value):
    # sql statement
    if value.isnumeric():
        sql = f"UPDATE [{tablename}] SET {field}='{values}' WHERE {fieldname}{condition}{value}"
    else:
        sql = f"UPDATE [{tablename}] SET  {field}='{values}' WHERE {fieldname}{condition}'{value}'"
    # execute the sql
    engine.connect()
    engine.execute(sql)

    return '', 200

# delete statment
@api.route('/delete/<string:tablename>/where/<string:fieldname>/<string:condition>/<string:value>')
def comditionalDelete(tablename, fieldname, condition, value):
    # sql statement
    if value.isnumeric():
        sql = f"DELETE FROM [{tablename}] WHERE {fieldname}{condition}{value}"
    else:
        sql = f"DELETE FROM [{tablename}] WHERE {fieldname}{condition}'{value}'"
    # execute the sql
    engine.connect()
    engine.execute(sql)

    return '', 200

if __name__ == '__main__':
    api.run(debug=True)
