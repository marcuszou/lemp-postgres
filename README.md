# Dockerize Nginx, PostgreSQL and PHP

by Marcus Zou | 21 Feb 2025 | 3 minutes Reading - 20 minutes Hands-on



## Intro

This is a wrap-up of what I have accomplished grabbing in the PostgreSQL database when dockerizing LEMP in the last few days.



## Prerequisites

- Linux: Debian or Ubuntu preferred, WSL2 distro works well
- Docker Engine/Desktop installed



## Quick-Start

1. Git clone my repo: https://github.com/marcuszou/lemp-postgres.git.

   ```shell
   git clone https://github.com/marcuszou/lemp-postgres.git
   ```

2. Fine tune the `docker-compose.yml` as needed.

   ```shell
   sudo chown -R $USER:$USER ./lemp-postgres
   cd lemp-postgres
   nano docker-compose.yml
   ```

3. Fire up the docker containers. 

   ```shell
   docker compose up -d
   ```

   Docker will pull down the relevant images and start the containers, which will take some time.

4. Access the website via http://localhost:8080, and access the `adminer` site at http://localhost:8432.



## Tech Stack and Notes

* This repo provides containers with Tech Stack:
    * __Linux__: Debian/Ubuntu is preferred, but it shouldn't matter much as far as you have a Docker Engine/Desktop installed
    * __Nginx__: latest (could select nginx: alpine for a smaller sized container)
    * __PostgreSQL__: latest (latest version = 17.4 currently)
    * __PHP__: 8.2-FPM (customized with quite a bunch of PHP extensions)
* Code in the `www` directory will be mapped into the Nginx container at `/var/www/html`
* Nginx will grab code from the `www` directory.
    * By default, `www/html/index.php` will provide you a `phpinfo()` report once mapped.
    * Current `Typecho` blog system is served at `www/typecho/` folder, to be mapped to `/var/www/html/` in the containers.
* If you want to use this repo for your dev, it is suggested you customize per your own project env.



## Future Implementation: local SSL

* There are default passwords for PostgreSQL's user `zenusr` user specified in `docker/docker-compose.yml` or `./db/env/pgsql.env`.
* You are strongly recommended to edit this `./db/env/pgsql.env` to replace the passwords as needed.
* This docker configuration has not been security consolidated (with SSL). Expose it to public networks at your own risk!
* If you place the containers in the Cloud Service Providers (AWS, GCP, Azure, Digital Ocean, etc.) or a Home NAS, the SSL issue will be taken care by them automatically.



## License

* MIT
