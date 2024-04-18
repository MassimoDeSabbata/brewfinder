# brewfinder

Questa repo contiene un test. L'applicazione consiste di un proxy verso il servizio openbrewerydb.org.
Lo scopo è quello di fornire delle API per poter avere una lista paginata ed un dettaglio dei dati presenti su openbrewerydb.org e fornire inoltre una interfaccia grafica per gli stessi dati.

## Installazione

Per poter avviare in locale l'applicazione è necessario avere installato sulla propria macchina:
- composer
- docker

Dopo aver clonato la repository in locale per avviarla eseguire i seguenti passaggi

```console
composer install
./vendor/bin/sail up
./vendor/bin/sail artisan db:seed
```

Successivamente, a meno di diversa configurazione, le api saranno disponibili su "localhost:80" e l'interfaccia grafica sarà accedibile da browser all'indirizzo "http://localhost".

## Utilizzo API

Sono disponibili le seguenti API:

- /api/user/login
- /api/brewery
- /api/brewery/BREWERY_ID

### Api User Login
La prima API è "/api/user/login" e fornisce un token di autenticazione.
Questa Api è una chiamata POST e il payload necessario è:

```json
{
	"name": "root",
	"password": "password"
}
```

Se si ha lanciato il comando artisan db:seeder i dati indicati permetteranno l'accesso (nome: root, password: password).

Nella response cercare il campo **plainTextToken** e utilizzarlo come bearer token nelle successive chiamate.

### Api Brewery List
La seconda API è "/api/brewery" che permette di visualizzare una lista dei dati presenti su openbrewerydb.org paginata.

Per paginare la lista a piacimento aggiungere **page** e **per_page** nei query params

```text
/api/brewery?page=1&per_page=50
```

Inoltre è possibile filtrare la lista con tutti i filtri disponibili sulla documentazione di [openbrewerydb.org](https://www.openbrewerydb.org/documentation/) sempre attraverso i query params.
Per esempio:

```text
/api/brewery?by_city=Portland&by_country=United+States
```

### API Brewery Detail
La terza API è "/api/brewery/BREWERY_ID" e questa api permette di avere il dettaglio di un singolo dato per id.

Per esempio:

```text
/api/brewery/4ccad9b9-f9cf-4d21-b6d5-ab005ee1532d
```

## Dashboard

Accedendo alla dashboard attraverso browser sarà possibile eseguire il login con nome utente o email, utilizzando gli stessi dati delle API (nome: root, password: password).

Successivamente si potrà navigare la lista paginata e filtrare per nome, stato e città. 

Entrando nel dettaglio si potranno vedere tutti i dati di ogni entry e una mappa del luogo in cui si trova, se le coordinate sono disponibili.

## Architettura

L'applicativo è stato scritto in Laravel. Alcuni punti di attenzione sono:

- Creazione di una Entity Brewery la quale non si riferisce ad un oggetto in DB ma ad un oggetto proveniente da servizio esterno openbrewerydb.org.
- Creazione di una RepositoryHTTP invece che una repository SQL per poter eventualmente utilizzare il Database anzichè il servizio esterno con minimo effort.
- Divisione stretta tra Controller e Service in modo da rendere il codice il più riutilizzabile possibile.
- Creazione di un Adapter OpenBrewery per poter rendere facile un eventuale adeguamento dell'applicazione nel caso in cui l'interfaccia delle API openbrewerydb.org dovesse cambiare

## Testing

Per eseguire i test lanciare il seguente comando:

```console
./vendor/bin/sail artisan test
```