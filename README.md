# Amplitudo Academy

This github repository is my final laravel project for a company named [Amplitudo](https://amplitudo.me/) where i was trained in the past few months for the Laravel framework.

## Amplitudo Academy-Web platform

*The Amplitudo Academy* web platform should be a platform that Amplitudo could realistically use. Users would primarily be introduced to which courses they can attend at our academy. The application would have several user roles: guest (user who has registered but is not a student of the academy), student of the academy, mentors, supervisors, admin. Each of them would have their own dashboard.  
### The user role **"Student of the academy"** includes:  
- They have their own profile - it fills them with basic information, in addition to the name and surname that it fills in with registration, which are a picture, description, github, linkedin, social networks.
- Have an overview of all the courses they attend, similar to classes in the google classroom
- Have a homework page. The mentor can review these homework assignments from his dashboard, evaluate them, comment on them ..
- They have a page for the projects they receive, when they pass a certain level of course  
### The user role **"Mentor"** includes:    
- He has an overview of the courses he is mentoring, when he enters the course he will be able to set homework
- Review of mentored users. Only he will have the right of access to see their homework (maybe even a supervisor).
- It also applies to him as it does to any user - the profile and its content. I would like to add a description of what he does as a programmer, what technologies he knows, etc.  
### The user role **"Supervisor"** includes:    
- Supervises and controls the mentors and students of the academy. There should be more supervisors envious of what types of courses you would follow (for backend, frontend, fullstack).
- Since the app would also have a blog, its posts would have a special priority, a look that sets it apart from other users.
- Profile as other users - same things as for mentor and trainees
- Has a review page in the form of graphs, performance of trainees and mentors  
### User role **"Admin"**:    
- overview of users
- has insight into the payment of courses
- he is the one who enrolls supervisors and mentors in the database
- controls the blog, publishes and has the right to "unsubscribe" the user if he did not comply with the terms of use agreed to during registration    
### The user role **"Guest"** includes:  
- This is the status he gets when registering, and when he enrolls for the course he gets the status of an academy student
- He can comment on blog posts, ask questions on comments related to the course
- It would have a demo video, which would explain why it should buy the courses offered by the company and how to use the application itself
- In essence, it would be a way to distinguish the ordinary user from the students of the academy  
  
The application would also have a blog on which mentors and supervisors would write important things related to the academy, and users could share their experiences, tips. The blog can be seen by everyone, even unregistered users, but only registered users can post. , to like and comment on it. The courses would be something like an e-commerce application. We have a special page for courses. Here everyone can view the courses. The "Guest" user roll can be enrolled for the course. When he makes the payment, all the content related to the course is automatically available to him. When the user enters the course, he has his name, a detailed description - what the student achieves after that course, as well as an intro video where the mentor introduces himself and talks about the course, what the student will learn, etc .. (similar to ¬¬¬¬ intro video on udemy courses). Of course, for each course there is a review in the form of comments, grades, number of participants, notes, etc. For each mentor, it is known which course the mentor is on, maybe we could set one course to have more mentors. Through that, the student of the academy would have a connection with the mentor, ie it is known which mentor (s) is in charge of which students of the academy. It is known for each supervisor which mentors and students he supervises. He has the right to write a report related to the mentor or student of the academy. Also, following this example, the mentor writes a report on the student of the academy. At the end of the completed course, the student of the academy can also write a report on how satisfied he is with the course, the mentor, comments, suggestions, possible complaints, etc.  

### Intructions to run this application    
First of all, You need to install composer, and run following snipets  
Starting the app: -cd /path/to/workspace/directory
-git clone https://github.com/LukaMugosa/Amplitudo-Academy
-`cd Amplitudo-Academy`
-`composer install`
- `npm install` 
- `copy .env.example .env`(for linux users:'cp .env.example .env')  
- `php artisan key:generate`
- open .env file enter required fields for database connection
- start MySQL
- `php artisan migrate`
- `php artisan storage:link`
- `php artisan db:seed`
- `php artisan serve`  
In seeder files you can find user credentials to log in. You can also register to use the app. Every user has it s own dashboard and it should be pretty intuitive to use.
