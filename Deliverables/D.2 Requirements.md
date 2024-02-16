# D.2 Requirements

## 1. Positioning

### 1.1 Problem Statement
The problem of lack of housing dedicated to travel nurses affects travel nursing agencies, hospitals (especially those in rural areas), landlords, and patients; the impact of which is staffing issues, quality of care, and tenant turnover.

### 1.2 Product Position Statement
For travel nurses who need housing, RNT-A-ROOM is a housing web application that focuses on comfort and safety for travel nurses across America; Unlike FurnishedFinder and AirBnB, our product focuses on travel nurses needs.

### 1.3 Value Proposition and Customer Segment
RNT-A-ROOM is a housing web application that tailors to travel nurses in the United States and their needs. RNT-A-ROOM offers comfort and safety on an easy-to-use platform that verifies users and housing options.

## 2. Stakeholders
### Users:
Travel Nurses and Property Owners
### Competitors:
FurnishedFinder, AirBnb, travel nursing agencies that already provide housing, and Vrbo.
### Detractors:
Users looking for vacation homes or long-term leases and students

## 3. Functional Requirements (features)
1. Homepage
1. Filters
1. Booking
1. Easy-to-use and mobile friendly
1. User profile
1. User verification
1. Property-owners web portal

## 4. Non-functional Requirements
1. Rating/Review system - helps users decide what to book.
1. AI chatbox - helps users navigate the web application.
1. Map - shows users where they could potentially live and nearby amenities.
1. User quiz filtering system - makes it easier for users to find their perfect housing.
1. Contact/About us page - allows for clear communication between users and developers. Also makes us seem more reliable.

## 5. MVP
Our MVP is a website that will allow users, mobile or desktop, to create verifiable user profiles that allow them to book housing with ease using filters.
We will test the web application by creating a prototype and performing mock bookings.
We are going to validate the user experience of creating profiles and booking housing.

## 6. Use Cases

### 6.1 Use Case Diagram
![Diagram](https://github.com/cl2493/cs386/blob/ca3db48c8bd30389e2949889de6fe3cd192b956d/d2.drawio.png)


### 6.2 Use Case Descriptions and Interface Sketch
Instructions:
Present one complete use case description for each member of the group. Therefore, if the group has 4 members, 4 use case descriptions are necessary. As the grading will not be individual, the group is responsible for keeping the quality and consistency of the whole document – avoid just splitting the work. Choose the most important use cases to describe. Follow the template provided in the Lecture slides to describe the use cases.

After each use case description, add a sketch of the corresponding user interface. This will be a good opportunity to start thinking about usability. 

Grading criteria (8 points): Follow the template to describe the use cases. Present an interface sketch for each use case. Describe the use case as a dialog between the user and the system. Do not use UI language in the description of the use case.

1. Use Case: Booking House
Actor: Tenants/Travel Nurses
Trigger: Agency Gave Travel Nurse Assignment + Looking for Housing
Precondition: User Profile + Filter + Verification
Postcondition: Confirm Lease Agreement with Property Owner
Success Scenario: User does booking request, Property Owner confirms booking, Payment gets processed at request time, User receives house during lease term.
Alternative Scenario: User clicks booking request, Property Owner rejects booking, User looks for another home.
![Booking UI Image](https://github.com/cl2493/cs386/blob/e39588949ebd99fe0d5a3197931da5a004eac618/BookingD2.png)

1. Use Case: Account Creation
Actors: Travel Nurses & Property Owners
Trigger: Wanting to use our services
Precondition: User is a travel nurse/property owner
Postcondtion: User creates a completed account
Success Scenario: User open website, user registers an account, user goes through verification, user account is created.
Alternative Scenario: User open website, user registers an account, user verification fails, user account is not created.
![Account Creation Image]()

1. Use Case: Using Filtering System
Actors: Travel Nurses
Trigger: Wanting a Specific Housing Environment 
Precondition: User has a verified account
Postcondtion: User finds a house
Success Scenario: User logs in with verified account, user uses search filters to discover their options, user finds homes and books them.
Alternative Scenario: User logs in with verified account, User uses search filters, User runs into error.
![Search Filter UI Image](https://github.com/cl2493/cs386/blob/783daaab8a73ec697236f1c4d07e4fbab1b29d9b/SearchFiltersD2.png)

1. Use Case: Giving a Review
Actors: Travel Nurses
Trigger: Users have an experience at a property
Precondition: User lived in one of the properties. (Verified)
Postcondtion: User post thier review.
Success Scenario: User logs in with verified account, user goes through past home location history, User finds the home they want to review, user rates the property out of 5 stars, user writes a comment about the property and the experience, and user post the review.
Alternative Scenario: User logs in with verified account, user goes through past home location history, User finds the home they want to review, review system isn't working. User forgets password to the account. 
![Review Image](https://github.com/cl2493/cs386/blob/main/Untitled%20Diagram.drawio.png)
## 7. User Stories
Instructions:
Write two user stories for each member of the group. They can be related to the same features described in the use cases or to different ones. Adopt the following format: "As a <ROLE>, I want <SOMETHING> so that <GOAL>." 

Establish a priority level for each user story and estimate how many hours each one will demand using the planning poker approach. 

Grading criteria (6 points): Use the provided format. The user stories should be in an adequate level of granularity (not too broad nor too specific). Provide the priority and estimation for each user story.

## Issue Tracker
Instructions:
The user stories should be registered in your GitHub issue tracker. Include here the link for your issue tracker and a screenshot of what you did. 

Grading criteria (1 point): Provide the URL and screenshot of the issue tracker. The user stories should be registered there.
