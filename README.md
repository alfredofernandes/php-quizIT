## PHP - Final Project
_Overview_

This is a team based assignment and you should work in teams of two or three. If a team has three members, the assignment will have the appendix below.

Create a PHP web application that thoroughly tests the user knowledge of certain topics. 
The data about the questions should all be stored in a database. You should have at least 20 questions in certain test. You should create at least two different tests for users to take. You should also capture basic user information that took the test as well as store the result of each test for users.

Your application should select 10 questions randomly for every user taking a certain test. 
Users should be presented with the tests available for them to take and once they select the test, for every question, user should select one option out of four options presented.

When the user answers the last question, the application should display the user's score and one of the following messages depending on their score:

- If score is greater than or equal 80%: _"You have successfully passed the test. You are now certified in -name of the test-!";_
- If score is less than 80%: _“Unfortunately you did not pass the test. Please try again later!”;_

The topics for the tests should be chosen carefully and all the questions should be meaningful. All the questions should be based on the certification topics you have chosen. Every user must be registered in the database in order to write the test. Collect basic user information such as:

- First name;
- Last Name;
- Email address;
- Phone Number;
- Address;

Users should be allowed to update their accounts and should be able to see their test attempts and scores.

## Appendix
_This section only applies to teams that have three members._

Your application should allow for an “admin” user to login into the web application. As an admin user, your application should display total number of users that have successfully passed the test, and number of users who have not passed the test as well as the average score of all users that have attempted the test. They should be able to also see how many users are currently writing the test.

Administrators should also be able to add/delete/modify questions as well as query user data and their test attempts (see test scores by given day, see all test scores, see the highest and lowest scores etc.)

Administrators should also be allowed to add/disable/modify tests.

## Technical Requirements + Rubric
_Total: 100 points_

- 10 pts: Design the Entity-Relationship Diagram;
- 10 pts: Create the physical database including all necessary constraints;
- 30 pts: Design and implement the middle tier using XAMPP on the server side in PHP;
- 10 pts: Design and implement the User Interface (all client-side code must be HTML5-compliant;
- 10 pts: Your website must be responsive;
- 10 pts: Document your code internally and/or externally;
- 10 pts: Test your code for accuracy and performance;
- 10 pts: Submit one single zip file containing:
	- All diagrams created;
	- All codes: PHP, HTML5, CSS3, Javascript;
	- Generate database script file;
	- Provide a readme.txt file explaining what the instructor should do to get your database and code up and running;
	- Document any existing/known bug;
	- Document group members and student_ids;
	- Each group member shall submit an individual file though moodle.
