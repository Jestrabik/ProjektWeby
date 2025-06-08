# ProjektWeby
## Dokumentace
**Tým:** *Jestřabík, Kolář, Fojtík*
## CodeIgniter
**Verze:** 4.4.3
## PHP
**Verze:** 8.2.4
## Jazyk
**Databáze:**

anglicky

jednotné číslo, všechno malým písmenem
snake case (př. nazev_databaze)
### Modelů, kontrolerů, migrací, seederů a knihoven:
anglicky

pascal case (př. NazevModelu)
### Názvy složek Views
anglicky

jednotné číslo, všechno malým písmenem

### Názvy Views:
anglicky

camel case (př. hlavniStrana)
### Názvy ostatních tříd, metod a proměnných:
anglicky

camel case (př. nazevTridy)

### Názvy route
anglicky

kebab case (př. pridat-uzivatel)

## Dokumentace projektu
# Autoři a rozdělení práce

- **Kolář** – Implementace databázového modelu, tvorba migrací, práce na backendové logice (modely, kontrolery pro týmy a zápasy), dokumentace.
- **Jestřabík** – Návrh a tvorba frontendové části (views, Bootstrap integrace), implementace autentizace a registrace uživatelů, práce na kontrolerech pro hráče.
- **Fojtík** – Vytváření vlastních knihoven (AlertLibrary, ImageLibrary), konfigurace projektu, integrace externích knihoven, správa konfigurací a bezpečnosti.

---

# Využité externí nástroje a knihovny

| Název         | Verze   | Autor                   | Licence | Odkaz                                |
|---------------|---------|-------------------------|---------|----------------------------------------|
| CodeIgniter 4 | 4.4.3   | CodeIgniter Foundation  | MIT     | [codeigniter.com](https://codeigniter.com/) |
| Bootstrap     | 5.3.3   | The Bootstrap Authors   | MIT     | [getbootstrap.com](https://getbootstrap.com/) |
| PHP           | 8.2.4   | The PHP Group           | PHP     | [php.net](https://www.php.net/)       |
| PHPUnit       | 10.5.16 | Sebastian Bergmann      | BSD-3   | [phpunit.de](https://phpunit.de/)     |

---

# Popis kontrolerů a jejich metod

## Home
- `index()` – Vrací hlavní stránku aplikace.

## TeamController
- `index()` – Zobrazí seznam týmů.
- `create()` – Zobrazí formulář pro přidání nového týmu.
- `store()` – Zpracuje odeslaný formulář a uloží nový tým do databáze.
- `edit($id)` – Zobrazí formulář pro úpravu týmu.
- `update($id)` – Uloží změny týmu do databáze.
- `delete($id)` – Smaže tým z databáze.

## PlayerController
- `index()` – Zobrazí seznam hráčů s možností stránkování.
- `create()` – Zobrazí formulář pro přidání hráče.
- `store()` – Zpracuje a uloží nového hráče včetně obrázku.
- `edit($id)` – Zobrazí formulář pro úpravu hráče.
- `update($id)` – Uloží změny hráče.
- `detail($id)` – Zobrazí detailní informace o hráči.

## MatchController
- `index()` – Zobrazí seznam zápasů.

## AuthController
- `login()` – Zobrazí přihlašovací formulář.
- `doLogin()` – Zpracuje přihlášení uživatele.
- `logout()` – Odhlásí uživatele.
- `register()` – Zobrazí registrační formulář.
- `doRegister()` – Zpracuje registraci uživatele.

---

# Popis vlastních knihoven

## AlertLibrary
- `setAlert($type, $message)` – Nastaví alertovou zprávu do session (např. pro úspěšné uložení, chybu apod.).

## ImageLibrary
- `upload($file, $uploadPath)` – Uloží nahraný obrázek do zadané složky, vrací název souboru nebo `false` při chybě.

---

# Popis konfiguračních proměnných

## App.php
- `$baseURL` – Základní URL aplikace (např. `http://localhost/projektweby/`).
- `$indexPage` – Název indexového souboru (většinou `index.php`).
- `$uriProtocol` – Způsob získávání URI (např. `REQUEST_URI`).

## Players.php
- `$perPage` – Počet hráčů na stránku (např. 8).

## Security.php
- `$csrfProtection` – Typ CSRF ochrany (`cookie` nebo `session`).
- `$tokenName` – Název CSRF tokenu.
- `$cookieName` – Název cookie pro CSRF.
- `$expires` – Expirace CSRF tokenu v sekundách.

## Database.php
- `$defaultGroup` – Výchozí skupina databázového připojení.
- `$default` – Pole s nastavením připojení k databázi (host, uživatel, heslo, databáze, driver apod.).

## Pager.php
- `$perPage` – Výchozí počet položek na stránku pro stránkování.
- `$surroundCount` – Počet čísel stránek okolo aktuální stránky.

---

# Seznam zdrojů

- CodeIgniter 4 Documentation  
- Bootstrap Documentation  
- PHP Documentation  
- PHPUnit Documentation  
- Github Copilot (AI)
