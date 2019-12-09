-- Execute all sql scripts

-- to chakib : alias majdb="\mysql --silent --user=massyUniv --password=password herault_events < database/all.sql && echo 'OK' || echo 'Fail'"

source database/create.sql;

source database/insert.sql;

-- source database/view.sql;

-- source database/trigger.sql;

 source database/queryLog.sql; 