<a href="https://moneyfellows.com/"><img src="https://github.com/amrmohamed25/MoneyFellows/blob/36fd13765a2c057204f1199409b57c2f85a0e24f/public/images/web_logo_white.png" width="200"></a>

This project is a replica of the famous mobile application "MoneyFellows". The Front-End part was done using HTML, CSS, Bootstrap, JavaScript, jQuery while the Back-End was done using Laravel & PHP. This project requires that the admin create a category only and everything else is done without the admin such as:
<ul> 
    <li>Starting gam3eyas "Money Circles"</li>
    <li>Checking and collecting payments</li>
    <li>Sending notifications for the users</li>
    <li>Applying extra fees if the user didn't pay</li>
</ul>

<h2>Idea of the project</h2>

The idea of this project is to help the users in saving money through a trusted and secured money circles. The user can register at anytime, can join multiple gam3yyas "Money Circles" at the same time and choose when he wants to get paid. This project also aims to make MoneyFellows app more accessible without the need to install a mobile application.

<h2>Screenshots</h2>

<img src="https://github.com/amrmohamed25/MoneyFellows/blob/36fd13765a2c057204f1199409b57c2f85a0e24f/public/images/welcome_page.gif">

<h2>Design Pattern</h2>

This project is using the MVC design pattern 
<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/MVC-Process.svg/1200px-MVC-Process.svg.png" width="400">
<h3>Views</h3>

It is that part of the application that represents the presentation of data.

Views are created by the data collected from the model data. A view requests the model to give information so that it resents the output presentation to the user.

The view also represents the data from charts, diagrams, and tables. For example, any customer view will include all the UI components like text boxes, drop downs, etc.

Example for views used in the project: welcome, login, admin, user,.., etc

<h3>Controller</h3>

The Controller is that part of the application that handles the user interaction. The controller interprets the mouse and keyboard inputs from the user, informing model and the view to change as appropriate.

A Controller send's commands to the model to update its state(E.g., Saving a specific document). The controller also sends commands to its associated view to change the view's presentation (For example scrolling a particular document)

Example for controllers used in the project: CurrentsController, CategoryController, Controller.

<h3>Model</h3>

The model component stores data and its related logic. It represents data that is being transferred between controller components or any other related business logic. For example, a Controller object will retrieve the customer info from the database. It manipulates data and sends back to the database or uses it to render the same data.

It responds to the request from the views and also responds to instructions from the controller to update itself. It is also the lowest level of the pattern which is responsible for maintaining data.

Example for models used in the project: User model, Current model , Category model.

<h2>Features</h2>

<ul>
    <li>Admin can create a category which will be used to create gam3eyas</li>
    <li>User can register many gam3eyas "Money Circles" according to his needs(money, months , when he wants to get paid)</li>
    <li>Starting gam3eyas "Money Circles"</li>
    <li>Checking and collecting payments</li>
    <li>Sending notifications for the users</li>
    <li>Applying extra fees if the user didn't pay</li>
    <li>User can modify when he wants to get paid if the gam3eyya "Money Circle" didn't start </li>
    <li>User can leave the gam3eya "Money Circle" if didn't start</li>
</ul>

<h2>User Manual</h2>

The admin should register his account <strong> with email: admin@admin.com</strong>.
