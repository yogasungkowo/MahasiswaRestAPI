# Mahasiswa RestAPI With Laravel Sanctum

### About

This is our final project for the exam.This is a system build with RestAPI using Laravel 11 Sanctum to control the login register and show the data.

This project was developed  by Group D in Integrative Programming Course:

- Prayoga Sungkowo (leader)
- Gatot Triantono
- Davi Gymnastiar
- Nurhasanah
- Anggie Syahzillah

### How To Using

### Base URL

`http://localhost:8000/api`

* You can access the data without login or register using GET to:
  ```
  http://localhost:8000/api/mahasiswa <to get all data of mahasiswa>
  http://localhost:8000/api/mahasiswa/{nim} <to get data to specific nim on the data>
  ```

* You can edit, update, or delete only if you are logged in or already registered to the server

  ```
  http://localhost:8000/api/register
  you can register with this given value :
  {
  	"name": "<your-name>",
  	"email": "<your-email",
  	"password":"<your-password"
  }
  
  http://localhost:8000/api/login
  you can login with this given value :
  {
  	"email":"<your-email>",
  	"password":"<your-password>"
  }
  
  after your login the system will give you a Bearer Token copy that and insert on header and then you can insert, update, or delete the data
  
  ```

* You can insert, update, and delete :

  ```
  http://localhost:8000/api/mahasiswa 
  http://localhost:8000/api/mahasiswa/{nim}
  <with method post and header Bearer token> 
  you can insert or update with this given value :
  {
  	"nama":"<the-mahasiswa-name>",
  	"nim":"<mahasiswa-nim>",
  	"jurusan":"<mahasiswa-jurusan>",
  	"fakultas":"<mahasiswa-fakultas>"
  }
  
  you can delete just add nim on the last url, e.g
  http://localhost:8000/api/mahasiswa/{nim}
  ```

  ### Support

  This project will not be finish without Learning Resource and we want to thank for 

  [](https://www.youtube.com/watch?v=_lfsvZZWsXE)