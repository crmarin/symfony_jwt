

##### insert a test user to get token before

```sh
INSERT INTO symfony.`user` (id,email,roles,password)
	VALUES (1,'admin@admin.com','["PUBLIC_ACCESS"]','$2y$13$/SHag07iNi3h1XXE4wDW2eg9UI3FqA0aNE6M2.bSOD.D/lDLsjTwS');
```

##### test login in route /api/login_check
```sh
curl --location --request POST '127.0.0.1:8000/api/login_check' \
--header 'Content-Type: application/json' \
--data-raw '{
    "username": "admin@admin.com",
    "password": "admin"
}'
```

##### register new user in route /api/register
after get token, set in the header as authorization: bearer xx
```sh
curl --location --request POST '127.0.0.1:8000/api/register' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE2NzQxNTgwMDAsImV4cCI6MTY3NDE2MTYwMCwicm9sZXMiOlsiUFVCTElDX0FDQ0VTUyIsIlJPTEVfVVNFUiJdLCJ1c2VybmFtZSI6ImFkbWluQGFkbWluLmNvbSJ9.HeMIkRJyO4AbO0op5YpA2oWW1JKIqSllpy-3gIkwzHZn-hpsok-c-qfE5cDYUNEz_8UxIZWgUBp62h48r_1RptXlPHGN2yWdTG4Fw0UOrnZUOteJB1lrlEkXRV93FqP0kgPreNOnsVCtbGtDCffFl8UI5l_CMfMUNCS7Tuk1kWXJl1hJ9OWc681WaPAwn1_uHspQP_qQ7q02BqEzXmlJZdykakmKWlvYy_nOURfzitUcXGgBHmL2QTmrl0MMd9rU_qER7ilsq9kN_tJhtHV7rG56ej5xyQlyjW8fXagPtMyYebvdr1ZegzDEHVzENEkPn9Bo5Qaqd76DwgT4HlW_Og' \
--data-raw '{
    "email": "admin2@admin.com",
    "password": "admin2"
}'
```

##### get all users in route /api/list
with same token you can get all list users
```sh
curl --location --request GET '127.0.0.1:8000/api/list' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE2NzQxNTgwMDAsImV4cCI6MTY3NDE2MTYwMCwicm9sZXMiOlsiUFVCTElDX0FDQ0VTUyIsIlJPTEVfVVNFUiJdLCJ1c2VybmFtZSI6ImFkbWluQGFkbWluLmNvbSJ9.HeMIkRJyO4AbO0op5YpA2oWW1JKIqSllpy-3gIkwzHZn-hpsok-c-qfE5cDYUNEz_8UxIZWgUBp62h48r_1RptXlPHGN2yWdTG4Fw0UOrnZUOteJB1lrlEkXRV93FqP0kgPreNOnsVCtbGtDCffFl8UI5l_CMfMUNCS7Tuk1kWXJl1hJ9OWc681WaPAwn1_uHspQP_qQ7q02BqEzXmlJZdykakmKWlvYy_nOURfzitUcXGgBHmL2QTmrl0MMd9rU_qER7ilsq9kN_tJhtHV7rG56ej5xyQlyjW8fXagPtMyYebvdr1ZegzDEHVzENEkPn9Bo5Qaqd76DwgT4HlW_Og' \
--data-raw ''
```