## How to run project

#### Install the npm dependencies
```sh
npm install
```

#### Run Vite

```sh
npm run dev
```

#### Run command php to serve the project locally

```sh
php artisan serve --port=9990
```



## Infomaniak configuration

From sbsoft.ch create a new site.

Select New empty site

Use your domain, select the domain, advanced option and select PHP version to 8.4.

#### Creazione del deposito GIT

Installazione, sul server:

Il deposito GIT è su /git_depot

Il sito si trova nella cartella /web/sbsoft 

Linee di comando da indicare:
```
cd
mkdir git_depot
cd git_depot/
git init --bare sbsoft.git
cd sbsoft.git
git update-server-info
git symbolic-ref HEAD refs/heads/main
```
#### Invio del repository locale al server

Da fare sul posto di lavoro in locale:
```
git init
git remote add origin ssh://bi6eju_stefano@bi6eju.ftp.infomaniak.com:/home/clients/5e12fea1847b615953d37ff7a8bcc6f9/git_depot/sbsoft.git
git status
git add .git commit -a -m "init"
git push --set-upstream origin master
git push
```

#### Clonazione del sito nella directory del server

Da fare sul server:

cd
cd sites
rm -r sbsoft/
git clone /home/clients/5e12fea1847b615953d37ff7a8bcc6f9/git_depot/sbsoft.git sbsoft/


#### Additional setup
La prima volta installare npm

composer install


Creare il link allo storage

php artisan storage:link

Script css to add manually

#### Configurazione host

il file da puntare è il folder public

Assicurarsi che il file .env sia correttamente configurato.
Una copia si trova nel folder ENVIRONMENT/sbsoft

## Aggiornamento del sito

Eseguire un push del nuovo codice su git_depot

andare nella cartella del progetto ed eseguire il comando
cd sites/sbsoft
git pull origin main