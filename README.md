# Undabot zadatak
Scraper koji pretražuje Github za nekim riječima...

## Instalacija
1) proučiti https://symfony.com/doc/current/reference/requirements.html
2) kreirati DB imena "undabot" (ili promijeniti .env file)
3) neobavezno, ali preporuka je kreirati vhost undabot.test koji pointa na undabot/public
```
$ git clone git@github.com:gosaric/undabot.git
$ cd undabot/
$ composer install
$ php bin/console doctrine:migrations:migrate
```
## Kako radi
```
GET http://udabot.test/score/<term>
Body response:
{
    term: <term> : string
    score: <score> : float
}
```
Primjer:
GET http://udabot.test/score/php
```
{"term":"php","score":0.009809921857179004}
```

## Verzioniranje
```
http://undabot.test/v1/welcome
```
```
http://undabot.test/v2/welcome
```

## Izazovi
1) Šalju se skoro istovremeno tri requesta prema githubu, vidjeti može li u jedan request
2) Requestovi bi trebali biti asinkroni
3) Rate limit?