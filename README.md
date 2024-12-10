# JMark

JMark is a lightweight, self-hosted bookmark management web application. It allows users to save, browse, and manage bookmarks with ease. The application uses a JSON file to store data, offering simplicity and portability. Bookmark management is facilitated through a user-friendly web interface, and changes require authorization for added security.
## Demo
[https://adriannowak.net/bookmarks/](https://adriannowak.net/bookmarks/)

## Features

-   **Bookmark Management**: Add, edit, and delete bookmarks via a simple web interface.
-   **JSON Storage**: Bookmarks are stored in a JSON file for easy backup and portability.
-   **Authorization**: Changes require an authorization code, set in the deployment settings.
-   **Responsive Design**: Built with Bootstrap for seamless use on any device.
-   **Self-Hosted**: Run it on your own server.

## Tech Stack

-   **Frontend**: JavaScript, Bootstrap
-   **Backend**: PHP
-   **Data Storage**: JSON file


## Installation

1.  Copy all files to your web server.
    
2.  Edit the `engine.php` file and set your desired authorization code:
        
        $auth = "test";

3.   Ensure the PHP has write permissions to the JSON file.

    #Assuming web server is based on apache:
    $chown apache:apache ./jmark/*
    
5.   Open the application in your web browser. You can browse and search bookmarks via homepage. To edit and add bookmarks, click on settings icon on the top right. Save changes using authorization code from step 2. 

## Security

Do NOT store sensitive information. Data is open to the web traffic. Security is good enough for a simple bookmark application.

## Known Issues
Web browsers tend to cache JSON file. If this happens click on "Raw Data" and hit F5.

## Contact
[https://adriannowak.net/](https://adriannowak.net/)

Happy bookmarking with **JMark**! 🎉
