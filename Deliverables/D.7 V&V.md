## 1. Description
RNT-A-ROOM is a housing web application that focuses on the needs of travel nurses. We offer comfort and safety on an easy-to-use platform that protects our users by verifying both tenants and rentals. Our system’s main features include a responsive homepage that loads within 3 seconds, a user profile that will display 5 user descriptions, user verification, and the ability to book listings.

## 2. Verification (tests)
Unit Testing

[PHP Unit Testing Link](https://github.com/cl2493/cs386/tree/main/Deliverables/Unit%20Test)
![url](https://github.com/cl2493/cs386/blob/main/images/phpunittesting1.png)

[Jest Testing Link](https://github.com/cl2493/cs386/blob/main/Deliverables/UnitTest/message.test.js)
![url](https://github.com/cl2493/cs386/blob/main/images/jesttestingmessage.png)


Acceptance Test

[Selenium Testing Link](https://github.com/cl2493/cs386/tree/main/Deliverables/AcceptenceTest)

This acceptance test navigates to a web application hosted at the provided URL.
It clicks on the login button and then on the nurse register button.
After clicking on the nurse register button, it waits for the sign-up title to appear on the page.
Once the sign-up title is visible, it retrieves the text of the title and logs it.
This test verifies the correct implementation of the nurse registration feature from the user interface perspective.
![url](https://github.com/cl2493/cs386/blob/main/images/sign-upaccept.png)


Tested Feature: The acceptance test checks the button will lead you to the correct page by reading on of the filter inputs on our listing page.
Explanation: The test navigates to a webpage, finds an element with the class "sub-btn" (presumably a submit button), clicks on it, waits for an element with the ID "bath-input" to be visible, and then retrieves the text of that element. This process simulates user interaction with the web page to ensure that the "bath-input" functionality works as expected.
![url](https://github.com/cl2493/cs386/blob/main/images/readbath.png)



## 3. Validation (user evaluation)
## Script:
Could you please share your initial impression when visiting the website?
Did the layout of the website feel intuitive to you?
What features did you find most useful?
Which features could be improved?
How does our website compare to other similar websites like Airbnb?
Where do you think we can improve?
What parts of the website do you think we did well on?
If you could rate our website for creativity, what would you give it?
How would you rate the layout of the website?
How easy was it to go through the different sections of the website?
On a scale of 1-10, how would you rate the user's experience?
What suggestions do you have for us? 

## Result:

![url](https://github.com/cl2493/cs386/blob/main/images/circlegraph.png)
![url](https://github.com/cl2493/cs386/blob/main/images/creativityresults.png)
![url](https://github.com/cl2493/cs386/blob/main/images/experienceresults.png)
![url](https://github.com/cl2493/cs386/blob/main/images/resultsnav.png)
![url](https://github.com/cl2493/cs386/blob/main/images/layoutresults.png)




For the other open ended results please click this link : [https://docs.google.com/spreadsheets/d/12yDwJAQa46uxrGi-AFMZem95v0nkz3b4_va0JLrcS2c/edit?resourcekey#gid=2057836844](https://docs.google.com/spreadsheets/d/12yDwJAQa46uxrGi-AFMZem95v0nkz3b4_va0JLrcS2c/edit?resourcekey#gid=2057836844)


## Reflection:
During our user evaluation, there were a few features that worked properly. The registration and the user login worked for all of our users. Our directory with all of our listings all displayed properly but our filter system broke the website for some of our users. The certification did not cause any issues for any of our users according to what we saw in the database but there were no comments about it in the survey. Those testing our website had the opportunity to communicate with us about any issues they were having with the site and the main issue was the filters. After we worked on it further after the testing, the filters work no matter the location you input.
When conducting our user evaluations, we observed that certain aspects of the website were less intuitive than we had liked. This included certain buttons and UI elements behaving in buggy manners. Additionally, more access to the profile and additional statistics/information would have been nice. Finally, some reported encountering a temporary 404 page when utilizing the website. 
Overall, some users felt that it was pretty easy to navigate through while others felt like they needed a guide to navigate through the system. Cathy created a doc with instructions so that the user can experience the completed functionalities of the project. They were asked for example, how easy the website is. According to the collected data, the feedback they provided was that it could be “easier”. We noticed that everyone who participated in the survey signed up as a travel nurse. This shows that the people were lazy and did not fully test the functionalities of the website, that being the property owner portal.
When signing up, Faith’s roommate chose to sign up as a travel nurse. When uploading the certification, she encountered an error, “unable to upload file”, after doing it again, the certification worked. As far as reservations and bookings are concerned, the users were able to play around with the listings and ratings.
Users appreciated the top bar and the search bar the most. We were also complimented on how nice the design of the website looks. Lastly, users really enjoyed both the popup on the top right with all the pages that the user can access and the notification bell.
Our value proposition was accomplished. We did everything we set out to do. We made a website that allows verified travel nurses to safely and comfortably book housing options from verified property owners.




