## Installation


1. Clone source file from github: git clone https://github.com/mrsamirmh/task-for-nicat-huseynli.git

2. Change direction: cd task-for-nicat-huseynli

3. Update composer: composer update

4. Create domains: 
      4.1 task.loc (for app)
      4.2 admin.task.loc (for admin panel)
      4.3 storage.task.loc (for storage)

5.Create mysql database.

6.Copy .env.example to .env:  cp .env.example .env

7. Edit .env. Write your own data for APP_NAME, urls, DB paramets.

8. generate APP_KEY: php artisan key:generate

9. DB migrate with seed: php artisan migrate --seed

10. Go to admin url and login with:
      email: webmaster@gmail.com
      password: password
