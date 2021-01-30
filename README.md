# Currency Manager
A currency manager that is capable of collecting the current exchange-rates from the MNB's (Hungarian National Bank - mnb from now on) website using soap and send them out to exchange offices. Will be capable to send generated exchange-rates to specific exchange offices. It can list the previous transactions made by an office, and sort them. It's currently being written in php using laravel.

By 'send out' I mean to send an e-mail to the office address with a .dbf file attachment containing the data.

# Requirements: 
Using SOAP client to get the exchange rates. You have to enable it in your php.ini

Database structure, see ```structure.txt```

Database conmections, see ```env.example```

Since chrome had an update on mixed content sites, we have to decide if we want to run the app with ssl.

If we run without ssl: smtp functionality/connection to secure servers will not work, also we have to make non secure connection to the MNB's soap service.

Recomended usage is with ssl so the smtp mail fuction can work properly. The soap connection to mnb's site has to be made via ssl.
