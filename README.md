# Currency Manager
A basic laravel application.

# Requirements: 
Using SOAP client to get the exchange rates. You have to enable it in your php.ini

Database structure, see ```structure.txt```

Database conmections, see ```env.example```

Since chrome had an update on mixed content sites, we have to decide if we want to run the app with ssl.

If we run without ssl: smtp functionality/connection to secure servers will not work, also we have to make non secure connection to the MNB's (Hungarian National Bank - mnb from now) soap service.

Recomended usage is with ssl so the smtp mail fuction can work properly. The soap connection to mnb's site has to be made via ssl.
