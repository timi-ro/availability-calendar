# Availability Calendar

**The Problem**

A spiritual retreat center needs to see the availability of one of their rooms **(Room 5)** for the month of **August, 2025**. They also want to store additional information about each guest. They want you to build a page with the following criteria:

1. The page must contain a calendar for August 2025. Here's a **wireframe** provided by the center:

    ![https://s3-us-west-2.amazonaws.com/secure.notion-static.com/27bd72fb-766d-42fa-8125-c2db0038a106/IMG_3699.jpg](https://s3-us-west-2.amazonaws.com/secure.notion-static.com/27bd72fb-766d-42fa-8125-c2db0038a106/IMG_3699.jpg)

2. When you hover over the day, show the name of the participant.
3. Any day where "Room 5" is occupied should be highlighted. 
4. In the registration hover, make a way to save a few values per registration (these values should be saved in a database local to the app, not via the API).
    1. flight info (text field)
    2. meal preference (drop down of 'omnivore', 'vegetarian' or 'vegan')
    3. ability to choose one or more of the following activities: yoga class, juice detox, massage and/or breath-work session
5. These two features are optional nice-to-have stretch goal features:
    - Display the number of available days for the month at the bottom of the calendar.
    - Include a switch that, when turned on, shows only registrations in the pending state. When it's turned off, the calendar goes back to its original state.
er if you use PHP and JavaScript to implement the solution, however you can use any language. You can also use any stack, library or framework (using a framework is totally fine, however we prefer no framework or light frameworks for client/server code because we like to see how you design things from the bottom up; but of course you can use libraries for any specific parts of the task). In the end, please code in the environment that is most comfortable for you.
- Once completed, send us a link to your source code on Github, Gitlab, or Bitbucket.
