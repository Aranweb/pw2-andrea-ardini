## Relazione di Progetto: Simple CRM
Studente: Andrea Ardini
Progetto: Applicazione Web per la Gestione di Clienti e Ordini
Data: 07 Ottobre 2025

### 1. Analisi delle Esigenze
Il progetto nasce dall'esigenza di creare un'applicazione web semplice e moderna per la gestione di un portafoglio clienti. L'obiettivo principale è fornire uno strumento intuitivo che permetta di visualizzare rapidamente le informazioni sui clienti e di consultare lo storico degli ordini associati a ciascuno di essi.

Le funzionalità richieste sono state identificate come segue:

Visualizzazione Centralizzata dei Clienti: L'utente deve poter accedere a una pagina principale che mostri una lista completa di tutti i clienti registrati. Per ogni cliente, dovranno essere immediatamente visibili le informazioni essenziali (nome e immagine) per una rapida identificazione.

Accesso al Dettaglio del Cliente: Dalla lista principale, l'utente deve poter selezionare un singolo cliente per accedere a una pagina di dettaglio dedicata.

Consultazione dello Storico Ordini: La pagina di dettaglio del cliente non deve solo mostrare i dati anagrafici (come indirizzo ed email), ma anche elencare in modo chiaro e ordinato tutti gli ordini che quel cliente ha effettuato, con le relative informazioni (descrizione, data, totale).

Navigazione Fluida: L'esperienza utente deve essere fluida, permettendo di passare dalla vista generale alla vista di dettaglio in modo rapido e intuitivo, tipico di una moderna Single Page Application (SPA).

### 2. Struttura del Layout e Design dell'Interfaccia
Per soddisfare le esigenze identificate, è stato progettato un layout pulito e minimale, strutturato su due viste principali.

Pagina 1: Lista Clienti
Questa è la schermata di atterraggio dell'applicazione.

Layout: La pagina presenta un titolo centrale e, subito sotto, una lista verticale di "card", una per ogni cliente.

Card Cliente: Ogni card è pensata per essere visivamente gradevole e informativa. Contiene:

Un'immagine del cliente (avatar) sulla sinistra per un riconoscimento immediato.

Le informazioni principali sulla destra: il nome in evidenza e, sotto, i contatti come email e indirizzo.

Interazione: L'intera card è cliccabile. Un clic porta l'utente alla pagina di dettaglio del cliente selezionato, garantendo un'interazione semplice e diretta.

Pagina 2: Dettaglio Cliente
Questa pagina è dedicata alla visione completa delle informazioni di un singolo cliente.

Layout: La pagina è divisa in due sezioni principali.

Sezione Anagrafica: In alto, una card prominente mostra i dati principali del cliente (immagine, nome, email, indirizzo), in modo simile alla lista ma con più spazio e risalto.

Sezione Storico Ordini: Sotto i dati anagrafici, una seconda sezione è dedicata agli ordini. Gli ordini sono presentati come una lista, dove ogni elemento mostra chiaramente il numero d'ordine, la descrizione, la data e l'importo totale.

Navigazione: Un link o un pulsante "Indietro" permette all'utente di tornare facilmente alla lista principale.

Questo design a due livelli (generale -> specifico) è uno standard molto diffuso perché guida l'utente in modo naturale attraverso l'esplorazione dei dati.

### 3. Scelte Progettuali e Processo di Sviluppo
Il progetto è stato sviluppato seguendo un'architettura moderna a due componenti separati ma comunicanti: un backend per la gestione dei dati e un frontend per l'interfaccia utente.

Scelta Tecnologica:

Per il backend è stato scelto Laravel, un framework robusto che ha permesso di creare in modo rapido e sicuro il "cervello" dell'applicazione, ovvero le API che forniscono i dati.

Per il frontend è stato scelto Angular, un framework potente per la creazione di interfacce utente dinamiche e reattive. Questa scelta ha permesso di costruire un'esperienza utente fluida e senza ricaricamenti di pagina.

Processo di Sviluppo:

Progettazione del Database: Per prima cosa, è stata definita la struttura dei dati, creando le tabelle per Clienti e Ordini e stabilendo la relazione tra di esse.

Sviluppo del Backend: Successivamente, è stata costruita l'API in Laravel, creando gli endpoint necessari per fornire al frontend la lista dei clienti e il dettaglio di un singolo cliente con i suoi ordini.

Sviluppo del Frontend: Infine, è stata costruita l'interfaccia utente in Angular, creando i componenti per le due pagine, configurando la navigazione (routing) e collegando i componenti al backend per visualizzare i dati reali.

Ambiente di Lavoro: Per garantire che il progetto funzioni correttamente su qualsiasi computer, è stato utilizzato Docker. Questo strumento ha permesso di "impacchettare" l'applicazione in un ambiente autocontenuto e affidabile, semplificando enormemente l'installazione e l'esecuzione.

### 4. Istruzioni per l'Esecuzione
Sono fornite due modalità per avviare l'applicazione.

Metodo A: con Docker (Consigliato)
Questo metodo è il più semplice perché installa e configura tutto automaticamente.

Prerequisiti: Aver installato Docker Desktop.

Decomprimere il file .zip del progetto.

Aprire un terminale nella cartella del progetto.

Lanciare un singolo comando per avviare l'intero ambiente: docker-compose up -d.

Attendere circa un minuto per il primo avvio, poi installare le dipendenze con i comandi forniti nella documentazione tecnica.

Accedere all'applicazione dal browser all'indirizzo http://localhost:4200.

Metodo B: Manuale (Senza Docker)
Questo metodo richiede che sul computer siano già installati e configurati un server web (come XAMPP), PHP, Composer e Node.js.

Backend: Configurare il progetto Laravel, importare il database fornito (dump.sql) e avviare il server locale.

Frontend: Aprire una seconda finestra del terminale, installare le dipendenze del progetto Angular e avviare il server di sviluppo.

Accedere all'applicazione dal browser all'indirizzo http://localhost:4200.

(Per i dettagli tecnici completi di ogni comando, si rimanda alla documentazione allegata al codice sorgente).










# Relazione Tecnica - Project Work 2

**Studente:** Andrea Ardini
**Progetto:** Simple CRM Clienti/Ordini
**Data:** 07 Ottobre 2025

---

### 1. Descrizione del Progetto

Il progetto consiste in una Single Page Application (SPA) per la gestione di un semplice database di clienti e dei loro ordini. L'applicazione è composta da due parti principali:

* **Backend API RESTful**: Realizzato con il framework **Laravel**, si occupa della logica di business, della gestione dei dati e dell'esposizione delle API necessarie al frontend.
* **Frontend**: Realizzato con il framework **Angular**, fornisce l'interfaccia utente per visualizzare la lista dei clienti, navigare nel dettaglio di un singolo cliente e visualizzare la lista degli ordini a lui associati.

La comunicazione tra frontend e backend avviene tramite chiamate HTTP a endpoint JSON.

---

### 2. Processo di Sviluppo Adottato

Lo sviluppo è stato condotto utilizzando un ambiente di sviluppo containerizzato basato su **Docker** e **Docker Compose** per garantire coerenza, isolamento e facilità di setup.

**Ambiente di Sviluppo:**
L'ambiente è orchestrato da un file `docker-compose.yml` che definisce quattro servizi principali:
1.  **`backend`**: Container con PHP 8.2-FPM per l'esecuzione di Laravel.
2.  **`frontend`**: Container con Node.js 18 e Angular CLI per lo sviluppo e la compilazione del frontend.
3.  **`webserver`**: Container Nginx che agisce da web server per il backend Laravel.
4.  **`db`**: Container MySQL 8.0 per il database relazionale.

**Fasi di Sviluppo:**
1.  **Setup dell'Ambiente Docker**: Creazione dei Dockerfile e del file `docker-compose.yml` per automatizzare l'ambiente.
2.  **Sviluppo Backend (Laravel)**:
    * Installazione e configurazione di un nuovo progetto Laravel.
    * Definizione dei modelli Eloquent `Customer` e `Order` e delle relative migrazioni per creare la struttura del database.
    * Implementazione delle relazioni "uno-a-molti" tra `Customer` e `Order`.
    * Creazione di `Seeder` per popolare il database con dati di prova.
    * Sviluppo di un `CustomerController` per gestire le richieste API.
    * Definizione delle rotte API tramite `Route::apiResource` per esporre gli endpoint RESTful.
3.  **Sviluppo Frontend (Angular)**:
    * Creazione di un nuovo progetto Angular basato su Moduli (`standalone: false`).
    * Implementazione di un `CustomerService` per incapsulare la logica di comunicazione con il backend tramite `HttpClient`.
    * Sviluppo dei componenti: `CustomerListComponent` per la visualizzazione della lista e `CustomerDetailComponent` per il dettaglio.
    * Configurazione del `AppRoutingModule` per gestire la navigazione tra le viste.
4.  **Version Control**: L'intero progetto è stato tracciato con Git e ospitato su un repository GitHub, adottando una strategia di branching (`main` per le versioni stabili, `develop` per lo sviluppo).

---

### 3. Scelte Progettuali Adottate

* **Stack Tecnologico**: La scelta di **Laravel** per il backend è motivata dalla sua robustezza, dalla rapidità di sviluppo offerta dall'ecosistema (Eloquent, Artisan) e dal suo ottimo supporto per la creazione di API RESTful. **Angular** è stato scelto per il frontend per la sua architettura strutturata basata su componenti e servizi, che favorisce la creazione di applicazioni complesse e manutenibili.
* **Architettura API**: È stato scelto un approccio RESTful. Per la pagina di dettaglio, l'endpoint `GET /api/customers/{id}` è stato ottimizzato per restituire in una singola chiamata sia i dati del cliente sia la lista dei suoi ordini (`$customer->load('orders')`). Questa scelta minimizza il numero di chiamate HTTP, migliorando l'efficienza e la reattività del frontend.
* **Containerizzazione (Docker)**: L'uso di Docker è stata una scelta strategica per creare un ambiente di sviluppo isolato e facilmente riproducibile, eliminando i problemi legati alle diverse configurazioni delle macchine locali ("funziona sulla mia macchina").

---

### 4. Istruzioni per l'Esecuzione

Sono previste due modalità di esecuzione.

#### Metodo A: Esecuzione con Docker (Consigliato)

Questo metodo è il più semplice e affidabile, poiché ricrea l'ambiente esatto in cui l'applicazione è stata sviluppata.

**Prerequisiti:** Docker e Docker Compose installati.

1.  Decomprimere il file `.zip` della versione Docker.
2.  Aprire un terminale nella cartella radice del progetto.
3.  Avviare i container in background:
    ```bash
    docker-compose up -d --build
    ```
4.  Installare le dipendenze del backend:
    ```bash
    docker-compose exec backend composer install
    ```
5.  Generare la chiave applicativa di Laravel:
    ```bash
    docker-compose exec backend php artisan key:generate
    ```
6.  Creare le tabelle del database e popolarle:
    ```bash
    docker-compose exec backend php artisan migrate --seed
    ```
7.  Installare le dipendenze del frontend:
    ```bash
    docker-compose exec frontend npm install
    ```
8.  L'applicazione è pronta. Accedere ai seguenti indirizzi dal browser:
    * **Frontend Angular**: `http://localhost:4200`
    * **Backend API Laravel**: `http://localhost:8080`

#### Metodo B: Esecuzione Manuale (Senza Docker)

Questo metodo richiede la configurazione manuale di un ambiente di sviluppo locale.

**Prerequisiti:**
* Un server web locale con PHP e MySQL (es. XAMPP, WAMP, MAMP).
* Composer installato globalmente.
* Node.js e npm installati globalmente.

1.  **Setup del Backend**:
    * Decomprimere il file `.zip` della versione "No Docker".
    * Creare un nuovo database vuoto nel proprio server MySQL (es. `pw2_db`).
    * Importare nel database appena creato il file `dump.sql`.
    * Navigare nella cartella `backend/`.
    * Copiare il file `.env.example` in un nuovo file chiamato `.env`.
    * Modificare il file `.env` con le credenziali del proprio database locale.
    * Installare le dipendenze: `composer install`.
    * Generare la chiave applicativa: `php artisan key:generate`.
    * Avviare il server di sviluppo di Laravel: `php artisan serve`. Sarà disponibile su `http://localhost:8000`.

2.  **Setup del Frontend**:
    * Aprire un **nuovo terminale** e navigare nella cartella `frontend/`.
    * Installare le dipendenze: `npm install`.
    * Avviare il server di sviluppo di Angular: `ng serve`. Sarà disponibile su `http://localhost:4200`.
    * **Nota**: Potrebbe essere necessario modificare l'URL dell'API nel file `frontend/src/app/services/customer.service.ts` per puntare all'indirizzo del server Laravel (es. `http://localhost:8000/api`).

3.  Accedere all'applicazione frontend tramite `http://localhost:4200`.