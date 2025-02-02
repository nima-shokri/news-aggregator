# **News Aggregator API**

This project is a **news aggregation system** that fetches articles from multiple sources, stores them in a database, and provides a API for accessing news.

---

## **🚀 Setup & Installation**

### **1️⃣ System Requirements**

- PHP 8.2+
- Laravel 11+
- MySQL / PostgreSQL
- Composer


### **2️⃣ Install Dependencies**

```bash
composer install
```

### **3️⃣ Configure Environment**

Copy the `.env.example` file and update environment variables:

```bash
cp .env.example .env
php artisan key:generate
```

Update your API keys in `.env`:

```env
#APIKEYS
NEWSAPI_API_KEY="YOUR_NEWSAPI_API_KEY"
GUARDIAN_API_KEY="YOUR_GUARDIAN_API_KEY"
NY_TIMES_API_KEY="YOUR_NY_TIMES"

```

### **4️⃣ Run Database Migrations & Seeders**

```bash
php artisan migrate --seed
```

---

## **📰 Scheduling News Aggregation (Cron Job)**

Laravel’s task scheduler will **fetch and store news articles automatically**.

### **1️⃣ Register the Cron Job**

Edit the crontab file:

```bash
crontab -e
```

Add the following entry to run the Laravel scheduler **every minute**:

```bash
* * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1
```

✅ **This executes Laravel’s scheduler every minute** and triggers the news fetch command when due.

### **2️⃣ Schedule News Fetching**

Modify `app/Console/Kernel.php` to run the command **hourly**:

```php
protected function schedule(Schedule $schedule)
{
    $schedule->command('news:fetch')->hourly();
}
```

### **3️⃣ Manually Fetch News** (For Testing)

You can manually run the news fetch command:

```bash
php artisan news:fetch
```

---



## **📡 API Endpoints**

### **1️⃣ Fetch News Articles**

```http
GET /api/v1/articles
```

#### **🔎 Filters Available:**

| Parameter       | Type   | Description                                        |
| --------------- | ------ | -------------------------------------------------- |
| `category_name` | string | Filter by category (e.g., `technology`)            |
| `source_name`   | string | Filter by news source (e.g., `BBC News`)           |
| `q`             | string | Search by keyword                                  |
| `publisher`     | string | Filter by publisher (e.g., `The Guardian`)         |
| `from_date`     | date   | Start date (`YYYY-MM-DD`)                          |
| `to_date`       | date   | End date (`YYYY-MM-DD`, must be after `from_date`) |
| `author`        | string | Filter by author name                              |

#### **📌 Example Request (Filtering by Technology Category & Author)**

```http
GET /api/v1/articles?category_name=technology&author=John Doe
```

---

## **🚀 Additional Features**

✅ **Automated news fetching (cron job)**

✅ **Advanced filtering for news articles**
✅ **Rate limiting to prevent abuse**

---

🚀 Happy Coding! 🎉

