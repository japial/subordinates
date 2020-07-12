# Organogram - Employee Department Role

## Setup Work Environment and Folder Structure 
1. Database Setup: Create a MySQL database and export this script /sql/*.sql - this gives you the basic structure of your code you may add more table based on the requirement. 
2. Database Configuration: you can find a example environment file here /src/.env.example you may rename it to /src/.env and add all your database information or you can directly go to /src/model.php file and go to line 36 and give your database information
3. If you need to add any common method you can use /src/config.php file 
4. Check composer.json and edit if it require and run `composer update` to setup all development dependency. 
5. Go to /examples/sample.php file and you can show all output here, it can be browse by http://LOCAL_HOST/PATH/scheduling/examples/sample.php
6. Development work - /src/, update all files and it structure based on your requirements, you can add multiple files or folder whatever need can be used! 
7. You can find model.php which is for database, it pre configured you can update or add more method, if it required. You can find employee.php which is define all your business logic and you can find some method is ready to use where you have to do your task. You may change it if it required. 
8. /docs/ if any document require that you need to put you can put here. 