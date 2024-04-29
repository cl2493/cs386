## 1. Introduction
RNT-A-ROOM is a housing web application that focuses on the needs of travel nurses. We offer comfort and safety on an easy-to-use platform that protects our users by verifying both tenants and rentals. Our system’s main features include a responsive homepage that loads within 3 seconds, a user profile that will display 5 user descriptions, user verification, and the ability to book listings.

https://github.com/cl2493/cs386

## 2. Implemented requirements
Requirement: As a hiring manager for a hospital, I want to provide an easy housing directory for travel nurses so that they can easily find suitable accommodations near the hospital.
Issue: [Issue 52](https://github.com/cl2493/cs386/issues/52)
[Issue 77](https://github.com/cl2493/cs386/issues/77)

Pull request: 
[Pull 164](https://github.com/cl2493/cs386/pull/164)
[Pull 162](https://github.com/cl2493/cs386/pull/162)
[Pull 138](https://github.com/cl2493/cs386/pull/138)
[Pull 124](https://github.com/cl2493/cs386/pull/124)
[Pull 118](https://github.com/cl2493/cs386/pull/118)
[Pull 42](https://github.com/cl2493/cs386/pull/42)

Implemented by: Aidan, Devin, Faith, and Cathy
Approved by: Cathy Ly
Print screen:

Requirement: As a travel nurse, I want to use the filters to find a home for my family of 4 so that my family can stay together.
Issue: [Issues 48](https://github.com/cl2493/cs386/issues/48)

Pull request: [Pull 142](https://github.com/cl2493/cs386/pull/142)
[Pull 155](https://github.com/cl2493/cs386/pull/155)
[Pull 158](https://github.com/cl2493/cs386/pull/158)
[Pull 162](https://github.com/cl2493/cs386/pull/162)
Implemented by: Devin Jay and Cathy
Approved by: Cathy Ly
Print screen: 


Requirement: As a property owner, I want a community of verified traveling professionals so that I can have peace of mind regarding my property.
Issue: [Issue #83](https://github.com/cl2493/cs386/issues/83)
Pull request: [Pull #137](https://github.com/cl2493/cs386/pull/137)
[Pull #151](https://github.com/cl2493/cs386/pull/151)
		
Implemented by: Faith
Approved by: Cathy Ly
Print screen: 


Requirement: As a hospital in a rural area, I want an easy way for travel nurses to book housing, so that I have more support in emergency situations.
Issue: [Issue 47](https://github.com/cl2493/cs386/issues/47)

Pull request: 
[Pull 171](https://github.com/cl2493/cs386/pull/171)
[Pull 164](https://github.com/cl2493/cs386/pull/164)
[Pull 162](https://github.com/cl2493/cs386/pull/162)
Implemented by: Aidan 
Approved by: Cathy Ly
Print screen: 


Requirement: As a user, I want a user profile so that I can review my personal information.
Issue: [Issue 82](https://github.com/cl2493/cs386/issues/82)
[Issue 79](https://github.com/cl2493/cs386/issues/79)

Pull request: https://github.com/cl2493/cs386/commit/358caa2d1725ef2b1efdb6b79e1062bbe2d1166f
https://github.com/cl2493/cs386/commit/f24345f8504552e3e04d6edc63b36540e6817eed
https://github.com/cl2493/cs386/commit/98a5030c8fbc6a1225606f2ee69363edeac3f3b8

Implemented by: Devin, Aiden, Cathy
Approved by: Cathy Ly
Print screen: 


## 3. Tests
[Test File Link](https://github.com/cl2493/cs386/tree/main/Deliverables/Unit%20Test)


## 4. Demo
VIDEO LINK


## 5. Code quality
Our team implemented code smells by changing and refactoring the quality of our code. As seen in the commits on Github, we all have taken steps to make our code more modular. Creating separate files and putting code in them so that our bigger files that handle more aren’t as busy.
An example of this practice is in our “upload certification” php file, the code follows the principle of moving statements to callers in some aspects.
Throughout our various files, we have different user types which makes our code more centralized and helps with code duplication.


Our team also implemented and practiced meaningful, distinctive names throughout our code. We intentionally utilized descriptive and revealing names for any code-related naming throughout this project. 
This can be observed through the meaningful distinctions present throughout the entire code base for example, in our “Property Owner Profile” we make meaningful distinctions between each layer/abstraction of the profile to allow for easier identification and debugging.


Our team also furthered our coding practices by focusing heavily on well-documented and commented code. This was accomplished through the use of necessary comments throughout the entire code base to assist with any endeavors regarding that piece of code. All comments were created with a specific goal in mind to further readability and overall understanding. Whether this goal was to be informative of a function, or explanation of intent regarding a specific variable. 


Our team includes error handling in our files and this is good coding practice because we can see where issues lie in our code. The error handling being at the top of our files makes the code easier to understand and maintain. For example, in both user profiles, we handle file uploads and we implement the “Replace Error Code with Exception” practice because we have different cases for how the file upload can go wrong.






## 6. Lessons learned

During our process in this project, we wish we thought ahead and planned out more comments, and made our code more modular. We often ran into problems with readability and trying to understand each other's work. If we had more time to continue developing our project, we would focus on readability and scalability to ensure our success. Another issue we ran into was developing our website. Currently, our website has white spaces and we would like to fill it up with more details and information but as we are more focused on making sure our site contains that bare minimum, there was less room for creativity with the time crunch. Overall, we believe that if we had started sooner with everything we know now, we believe we could have produced a better, well-thought-out website.