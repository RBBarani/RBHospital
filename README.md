<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Laravel Hospital Management with PDF upload and viewer

This is MultiLogin app for Hospital. Like as, GuestUser, Patient, Doctor and Admin. Also Admin can upload PDF files and view using iframe

## Tech stack used, including specific libraries / versions

**Front-end side:**<br />
   ○ Bootstrap / Version 5<br />
   
**JS Libraries used** <br/>
    ○ DataTables.js /version 1.11.5 <br />
    ○ Jquery / Version 3.6.0<br />

**Back-end side:**<br />
        **Framework:** <br />
            ○ Laravel / Version 8 <br />
        **Database:** <br />
            ○ Mysql <br />


## Project setup guidelines. How to install and run on your local system

1. git clone https://github.com/RBBarani/RBHospital.git
2. cd RBHospital/
3. In project path terminal type **composer update**
4. In project path terminal type **cp .env.example .env** (Note: In windows use this command **copy .env.example .env**)
5. In project path terminal type **php artisan key:generate**
6. Add your **database config** in the **.env file** (Note: Enter your database name)
7. In project path terminal type **php artisan migrate** (Note: Make sure phpmyadmin **Apache and Mysql** is started and **database is created**)
8. In project path terminal type **php artisan db:seed** (Note: Make sure **database is created**)
8. In project path terminal type **php artisan tinker** (Note: Make sure **seeder is run**)
8. In project path terminal type **Patients::factory()->count(10)->create()**, **Doctor::factory()->count(10)->create()** (Note: For create fake datas **tinker is also running **)
9. In project path terminal type **php artisan serve** (if the server opens up, **http://127.0.0.1:8000,**  then we are good to go)

**Note:** sample **rbhospital.sql** file there on root folder if you want to skip step 7. Just import the file in your database. <br />
**Note:** sample **credentials.txt** file there on root folder if you want to login credentials and urls 

## Aproach to build the project
First understand the requirements and then created template. And setting multiple guards and its validation and PDF upload and viewer. And also set datatables for listing records to easily search datas.

## What i liked about this project
It is multiauth app. In first time i will worked with three logins. Its very most liked me. And also PDF viewed as iframe. Thats also really good.

## What you didn’t like
Its a good Project. there is nothing i didn't like. 

## Where i faced issues
 Find on datetime format only.

## Estimated time to complete.
PDF - 2 HRS Including search its template also.
Multi Login - 8 Hrs

## What is pending by your side?
DateTime.