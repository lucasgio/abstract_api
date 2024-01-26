
## Installation

Install abstract_api development environment 

**Clone project** 
```bash
  https://github.com/lucasgio/abstract_api.git
  
```
**Composer install dependencies** 

Before do this steps. You must have installed recent composer setup
```bash
composer install
```

**Copy env.example to .env**
```bash
cp .env.example .env
```

**Setup migration**

Before this step.You must have installed the most recent mysql driver on your computer.
```
php artisan migrate
```

**Setup project** 
```bash
php artisan key:generate
php artisan config:clear
```

**Run test**
```bash
php artisan test
```



    
## API Reference

#### Get all product

```http
  GET /api/v1/product
```

#### Get one product

```http
  GET /api/v1/product/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Id of item to fetch |


#### Create product

```http
  POST /api/v1/product
```

| Parameter  | Type      | Description   |
| :--------- | :-------- | :------------ |
| `name`     | `string`  | **Required**. |
| `price`    | `integer` | **Required**. |
| `quantity` | `integer` | **Required**. |


#### Update product

```http
  PUT /api/v1/product/${id}
```

| Parameter  | Type      | Description   |
| :--------- | :-------- | :------------ |
| `id`       | `integer` | **Required**. |
| `name`     | `string`  |               |
| `price`    | `integer` |               |
| `quantity` | `integer` |               |

#### Delete product

```http
  DELETE /api/v1/product/${id}
```
| Parameter | Type     | Description                        |
| :-------- | :------- | :--------------------------------- |
| `id`      | `string` | **Required**. Id of item to delete |
