# PHP - CNAM 2024

## Base de données - Configuration

Créer un fichier `db.ini` dans le dossier `config`, inscrire ensuite vos propres données de configuration :

```ini
HOST=127.0.0.1
PORT=3306
DB_NAME=db_name
CHARSET=utf8mb4
USER=user
PASSWORD=pass
```

De la même manière, créez un fichier `admin.ini` dans le dossier `config`, y inscrire les identifiants que vous souhaitez pour avoir accès au mode admin et pouvoir ajouter des produits/catégories : 

```ini
ADMIN_LOGIN=ADMIN LOGIN
ADMIN_PASSWORD=ADMIN PASSWORD
```
