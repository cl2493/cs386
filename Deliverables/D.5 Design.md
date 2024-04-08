# D.5 Design
## 1. Description
RNT-A-ROOM is a housing web application that focuses on the needs of travel nurses. We offer comfort and safety on an easy-to-use platform that protects our users by verifying both tenants and rentals. Our system’s main features include a responsive homepage that loads within 3 seconds, a user profile that will display 5 user descriptions, user verification, and have the ability to book listings. Users can create and sign in to their own accounts and within these accounts, they can either browse and book listings or list their own listings.

## 2. Architecture
![url](images/architecture_uml.png)

## 3. Class Diagram
![url](images/classdiagram.drawio.png)

## 4. Sequence Diagram
Use Case: Account Creation 
Actors: Travel Nurses & Property Owners 
Trigger: Wanting to use our services 
Precondition: User is a travel nurse/property owner 
Postcondtion: User creates a completed account 
Success Scenario: User open website, user registers an account, user goes through verification, user account is created. 
Alternative Scenario: User open website, user registers an account, user verification fails, user account is not created.

![url](images/sequence_diagram.png)

## 5. Design Patterns
Design Pattern: Behavorial -> Command
classes.php
![url](images/command_design.png)

Design Pattern: Structural -> Composite
![url](images/compositeDiagram.png)

## 6. Design Principle 
S - Single-Responible Principle
![url](images/single-responsibility.png)
The image class has one responsibility, and that is to create an image object. It stores the imageName and the path to the image itself.

O - Open-Closed Principle
![url](images/open-closed.png)
![url](images/open-closed2.png)
The User class is an example of the Open-closed Principle. It is extended by the TravelNurse and Property Owner class, but it does not need to be modified for either. The functions in the User class works for both subclasses, and if another type of subclass is needed, it would have the same properties so no modification to the User class is needed.

L - Liskov Substitution Principle
![url](images/Liskov-substitution.png)
Liskov Substitution Principle is when the the subclasses are substituable for the base class. In our program, the User class is our base class where as our Travel Nurse and Property Owner are our subclasses that are interchangeable and does not affect the original base class.


I - Interface Segregation Principle
![url](images/open-closed.png)
The User class only has functions that the subclasses would need. Any other functions, such as the updateStage function, are in their respective classes where they are only needed for that specific class.

D - Dependency Inversion Principle
![url](images/DIP.png)
The User, Travelnurse, and Property Owner class depend on abstractions and not concrete implementations for the connection to the database. The interface DatabaseConnection acts as the buffer between the connection and the classes. It allows different types of databases to be used without knowing the connection type, which is an abstraction.
