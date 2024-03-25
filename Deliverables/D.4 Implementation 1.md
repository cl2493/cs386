# D.4 Implementation 1

## 1. Introduction

RNT-A-ROOM is a housing web application that focuses on the needs of travel nurses. We offer comfort and safety on an easy-to-use platform that protects our users by verifying both tenants and rentals. Our system’s main features include a responsive homepage that loads within 3 seconds, a user profile that will display 5 user descriptions, user verification, and have the ability to book listings. 

Disclaimer: RNT-A-ROOM is in early development.

https://github.com/cl2493/cs386

## 2. Implemented requirements

Requirement: As a Travel Nurse, I want the system to be accessible via desktop so that I can better complete my day-to-day tasks.

Issue:
https://github.com/cl2493/cs386/issues/13

Pull request:
https://github.com/cl2493/cs386/pull/1
https://github.com/cl2493/cs386/pull/2


Implemented by: Cathy Ly

Approved by: Cathy Ly

Print screen: 
![url](https://github.com/cl2493/cs386/blob/ceac6939dff5c74103dc09f64a146e54484c30a5/assets/desktop-display.png)

Requirement: As a user, I want a user profile so that I can review my personal information.

Issue:
https://github.com/cl2493/cs386/issues/82
https://github.com/cl2493/cs386/issues/79


Pull request:
https://github.com/cl2493/cs386/pull/97
https://github.com/cl2493/cs386/pull/103
https://github.com/cl2493/cs386/pull/116


Implemented by: Faith, Aidan, Cathy, Devin

Approved by: Cathy Ly

Print screen: 
![url](https://github.com/cl2493/cs386/blob/90446f1638e98e549e49fd5f8b5cb6f5e22a1539/assets/nurse-profile.png)
![url](https://github.com/cl2493/cs386/blob/ceac6939dff5c74103dc09f64a146e54484c30a5/assets/property-owner.png)
Requirement: As a property owner, I want a community of verified traveling professionals so that I can have peace of mind regarding my property.


Issue:
https://github.com/cl2493/cs386/issues/83
https://github.com/cl2493/cs386/issues/80


Pull request:
https://github.com/cl2493/cs386/pull/101


Implemented by: Faith, Aidan, Cathy, Devin

Approved by: Cathy Ly

Print screen: N/A


## 3. Tests
You should implement automated tests that aim to verify the correct behavior of your code. Provide the following information:

1.Test framework you used to develop your tests (e.g., JUnit, unittest, pytest, etc.)

1.Link to your GitHub folder where your automated unit tests are located
1.An example of a test case. Include in your answer a GitHub link to the class being tested and to the test
1.A print screen showing the result of the execution of the automated tests

Grading criteria (4 points): You should have an adequate number of automated tests. They should be well-written to exercise the main components of your system, covering the relevant inputs.

## 4. Adopted technologies
HTML/CSS/Javascript
**Description**:
These are the core structure of creating web pages and applications. HTML gives us the structure, CSS focusing on presentation and styles, and Javascript allows our website to be more dynamic.
Justification: 
These are fundamental in creating a website or a web application. They are applicable for all different web browsers.

PHP
Description: PHP is a scripting language often used for web development. It’s used mainly in web development to create dynamic websites and applications.
Justification: PHP is used to provide an open source and server side scripting in our website.

MySQL
Description: MySQL is a database management system. 
Justification: This helps us to store data in tables in our database. It is not a programming language, but is used to store data.

GitHub
Description:
Github was adopted as the team’s choice of version control software. Github provided our team with all the necessary tools to properly collaborate and maintain our project. Github allows for seamless VS code integration, allowing us to maintain our project in any manner, straight from our chosen coding environment.
Justification:
We selected github as our version control platform due to its simplicity and its wide adoption in the industry as well as third party app support. 

Heroku
Description:
Heroku is a cloud platform service that allows developers to deploy, manage, and scale their applications. They support multiple coding languages and provide built-in tools for continuous integration.
Justification:
We chose Heroku for their ease of use platform and their simple layout. Being familiar with Github pages, Heroku allowed us to seamlessly integrate our application on their cloud platform service.

VSCode
Description: VS code is a source-code editor. It allows developers to write code with a clean and simple UI. It has several features that make it a great candidate for our project. One feature is that it works well with git. You can easily stage, commit, and push your changes with clicking of buttons. You don’t have to spend precious time memorizing or writing commands. You can also create pull requests and see the issue tracker very easily.
Justification: We chose to use VS code because of how easy it is to use. It looks nice and works well. Also, we needed a code editor that works on everyone’s device. The added git features makes VS code the best choice for us. Because of how easy VS code is to use with git, we spend more time coding and developing than we memorizing and typing commands.

## 5. Learning/training
HTML/CSS/Javascript
Using our past experience in CS 212 and 312, we applied that our knowledge to this project to create our website.

PHP
The team employed the strategy of Youtube videos and online resources. We spent much of our time learning the syntax of the language.

MySQL
The team did research on these technologies beforehand and brought it upon themselves to experiment and see what worked for the benefit of the website. The perseverance of the team to implement technologies that we haven’t previously used before for trial and error is admirable.

GitHub
Our team utilized numerous online videos as well as the heavy in class assignments focusing on github and its many features.

Heroku
We reviewed videos and other online resources to understand how to implement their services for our application. We also talked to other students to understand how a cloud service platform works.

VSCode
We used both strategies of trial and error and past experiences to learn VS code. Online references were also helpful.

## 6. Deployment
https://rnt-a-room-db33fe3ae403.herokuapp.com/index.php

We push and commit changes on github and make sure there are no conflicts affecting the main branch, then we deploy RNT-A-ROOM on Heroku. Heroku is a cloud platform service and we are using it for our webhosting.

## 7. Licensing
Mit License : https://choosealicense.com/licenses/mit/
[Our License](https://github.com/cl2493/cs386/blob/main/LICENSE)
We chose the MIT license because it’s recognized for being simple and flexible. We want others to have access and allow them to do what they want to the code with minimal restrictions.

## 8. README File
[README](https://github.com/cl2493/cs386/blob/main/README.md)

[CONTRIBUTION.MD](https://github.com/cl2493/cs386/blob/main/CONTRIBUTING.md)

[CODE OF CONDUCT](https://github.com/cl2493/cs386/blob/main/CODE_OF_CONDUCT.md)
## 9. Look & feel
RNT-A-ROOM was created using HTML, CSS, JS, along with PHP. The HTML and CSS made it look pleasing to the eye along with JS for friendly user interaction. We wanted an elegant and modern look to our website. The logo is simple yet professional and the colors are calm and consistent throughout the website. The only time the colors change is to show the difference between the nurse profile page and property owner profile page. We referenced Airbnb and FurnishedFinders to understand what was already on the market and the following photos is what we came up with:

## 10. Lessons learned
During the first release, we assigned roles to ourselves and concluded that Aiden hates frontend, Faith hates the backend, Devin hates the back end but prefers it over the front end, and Cathy loves the front end. Aiden learned a lot about specific adopted technology and is more familiar with it, he struggled with CSS and sometimes it doesn’t do what is expected. Devin learned that he loves to use VS Code for development and it’s ideal instead of Notepad++. He mentions that dealing with the database is the most annoying thing. We started with 2 tables and now have 5 tables. Faith learned a lot about php and sql syntax, but getting it to communicate with the frontend is not easy. Errors are hard to understand, she feels like it would be more helpful to understand the database before development. Cathy loves CSS and doing animations through CSS is more fun for her and not as complicated as JS. She found php to be easier than she expected. For the second release, we collectively agreed that the front end needs a routine and to make things simple so it’s easier on the backend to handle tasks. That friend end should push basic things for the website such as forms and buttons. We agreed on writing at least 10 lines of code a week, and to amp up our communication in our group chat. For example, mentioning what we did and creating pull requests, also to write more comments with our code.

## 11. Demo
[RENT-A-ROOM Demo](https://drive.google.com/file/d/1X09KP0NJy46pzPvZEwxM_6r5hLa022jE/view)

